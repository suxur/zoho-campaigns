<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller {

	function __construct()
	{
		parent::__construct();

        if (ENVIRONMENT == 'production') $this->auth->checkAuth(TRUE);

		$this->load->model('campaign_model');
		$this->load->model('seminar_model');
		$this->load->model('total_model');
    }

	function index()
	{
		if (!empty($_GET) && $_GET['id'] != NULL)
		{
            $data = array(
                'title'    => 'Campaign Information',
                'page'     => 'campaign_view',
                'nav'      => 'campaign_nav',
            );

            setlocale(LC_MONETARY, 'en_US');

			$params = array('campaign' => $_GET['id']);

			$this->load->library('FetchCampaign', $params);
			
			$xml = $this->fetchcampaign->fetch();

			if (isset($xml))
			{
				$data['zoho'] = array(
					'campaign_id'		=> (string) $xml->result->Campaigns->row[0]->FL[0],
					'name'				=> (string) $xml->result->Campaigns->row[0]->FL[1],
					'status'			=> (string) $xml->result->Campaigns->row[0]->FL[2],
					'zoho_id'			=> (string) $xml->result->Campaigns->row[0]->FL[3],
					'coop_commission'	=> (string) $xml->result->Campaigns->row[0]->FL[4]
				);

                $this->campaign_model->primary_key = 'campaign_id';
				$data['campaign'] = $this->campaign_model->get($data['zoho']['campaign_id']);

				if (!empty($data['campaign']) && $data['campaign']['id'] != NULL)
				{
					$data['seminars'] = $this->seminar_model->get_seminars($data['campaign']['id']);
				}
			}

            $this->load->view('layout', $data);
		}
    }

    function save()
	{
		if ($_POST)
		{
            $post = $this->input->post();

            $id             = $post['id'];
            $campaign_id    = $post['campaign_id'];

            $this->load->library('totals');

			$seminar_total 	 = $this->totals->seminarCost($post);
			$travel_total 	 = $this->totals->travelCost($post);
			$marketing_total = $this->totals->marketingCost($post);

            $rules = $this->campaign_model->rules;
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == TRUE)
            {
                $data = $this->campaign_model->array_from_post(array(
                    'zoho_id', 'campaign_id', 'status', 'name', 'coop_commission', 'days_on_road',
                    'num_employees', 'hotel_cost', 'catering_cost', 'location_rental', 'est_vehicle_miles',
                    'vehicle_cost', 'plane_ticket_cost', 'packets_and_pens', 'fliers', 'radio', 'newspaper',
                    'direct_mail', 'automated_calls', 'self_cert_price', 'pe_price', 'self_cert_containment_price',
                    'pe_containment_price', 'inspection_price', 'spill_kit_price',
                ));

                if (isset($id) && $id != NULL)
                {
                    $insert_id = $this->campaign_model->save($data, $id);

                    $data = array('seminar_total' => $seminar_total, 'travel_total' => $travel_total, 'marketing_total' => $marketing_total);
                    $this->total_model->save($data, $id);
                }
                else
                {
                    $insert_id = $this->campaign_model->save($data);

                    $data = array('campaign_id' => $insert_id, 'seminar_total' => $seminar_total, 'travel_total' => $travel_total, 'marketing_total' => $marketing_total);
                    $this->total_model->save($data);
                }
            }
            else
            {
                echo validation_errors();
            }

            $params = array('id' => $insert_id, 'campaign_id' => $campaign_id, 'delete' => FALSE);

            $this->load->library('UpdateCampaign', $params);

            $this->updatecampaign->update();

            echo json_encode($post);
        }
	}

	function delete()
	{
        $campaign = $this->input->get();

		$id				= $campaign['id'];
		$zoho_id		= $campaign['zoho_id'];
		$campaign_id	= $campaign['campaign_id'];

		if (isset($id) && $id !== NULL)
		{
			$this->campaign_model->delete($id);
            $this->seminar_model->primary_key = 'campaign_id';
			$this->seminar_model->delete($id, FALSE);
			$this->total_model->delete($id);

            $params = array('id' => $id, 'campaign_id' => $campaign_id, 'delete' => TRUE);

            $this->load->library('UpdateCampaign', $params);

            $this->updatecampaign->update();
		}

		ob_start();

		redirect(site_url() . "/campaign?id=" . $zoho_id);

		ob_end_clean();
	}
}

/* End of file campaign.php */
/* Location: ./application/controllers/campaign.php */