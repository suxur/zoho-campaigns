<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends CI_Controller {

	function __construct()
	{
		parent::__construct();

        if (ENVIRONMENT == 'production') $this->auth->checkAuth(TRUE);

		$this->load->model('seminar_model');
		$this->load->model('campaign_model');
		$this->load->model('total_model');

		$this->load->library('totals');
    }

	function index()
	{
		$data = array(
			'page'  => 'seminar_view',
			'nav'   => 'seminar_nav'
		);

		if (!empty($_GET) && $_GET['campaign_id'] != NULL)
		{
            $campaign_id = $_GET['campaign_id'];

            $this->campaign_model->primary_key = 'campaign_id';
            $data['campaign'] = $this->campaign_model->get($campaign_id);

            $data['title'] = 'Campaign: ' . if_set($data['campaign']['name'], '', FALSE) . ' - Seminar Information';

			if (!empty($_GET['id']) && $_GET['id'] != NULL)
			{
                $id = $_GET['id'];

                $data['seminar'] = $this->seminar_model->get($id);

				$pe_total        = $data['seminar']['pe_sold'] * $data['campaign']['pe_price'];
				$self_cert_total = $data['seminar']['self_cert_sold'] * $data['campaign']['self_cert_price'];
				$data['plans_total'] = $pe_total + $self_cert_total;

				$pe_containment_total        = $data['seminar']['pe_containment_sold'] * $data['campaign']['pe_containment_price'];
				$self_cert_containment_total = $data['seminar']['self_cert_containment_sold'] * $data['campaign']['self_cert_containment_price'];
				$data['containment_total'] = $pe_containment_total + $self_cert_containment_total;
			}

			$data['seminars'] = $this->seminar_model->get_seminars($data['campaign']['id']);
		}

		$this->load->view('layout', $data);
	}

	function save()
	{
		if ($_POST)
		{
            $post = $this->input->post();

            $id             = $post['id'];
            $seminar_id     = $post['seminar_id'];
            $campaign_id    = $post['campaign_id'];
            $date           = str_replace("/", "-", $post['datetime']);

			$prices = $this->campaign_model->get_prices($id);

			$values = array_merge($post, $prices);

			$totals = $this->totals->seminarRevenue($values);

            $rules = $this->seminar_model->rules;
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == TRUE)
            {
                $data = $this->seminar_model->array_from_post(array(
                    'name', 'contact', 'phone', 'cost', 'payment', 'street', 'city', 'state',
                    'zip_code', 'county', 'arrival_time', 'arrival_confirm', 'coop_contact', 'coop_phone',
					'refreshments_cost', 'refreshments_offered', 'refreshments_type', 'refreshments_payment',
					'radio_station', 'radio_contact', 'radio_phone', 'radio_cost' ,'radio_payment', 'newspaper_name',
					'newspaper_contact', 'newspaper_phone', 'newspaper_cost', 'newspaper_payment', 'projector_screen',
                    'wifi', 'cell_reception', 'attendees', 'num_under_threshold', 'pe_sold', 'self_cert_sold',
                    'pe_containment_sold', 'self_cert_containment_sold', 'pe_liner_sold', 'self_cert_liner_sold',
					'spill_kits_sold', 'inspection_sold',
                ));

                $data['campaign_id'] = $id;
                $data['date'] = $date;

                $data['total']					 	  = strip_comma($totals['total']);
                $data['pe_amount'] 					  = strip_comma($totals['pe_amount']);
                $data['spill_kit_amount'] 			  = strip_comma($totals['spill_kit_amount']);
                $data['self_cert_amount'] 			  = strip_comma($totals['self_cert_amount']);
			    $data['inspection_amount'] 			  = strip_comma($totals['inspection_amount']);
                $data['pe_containment_amount'] 		  = strip_comma($totals['pe_containment_amount']);
                $data['self_cert_containment_amount'] = strip_comma($totals['self_cert_containment_amount']);
				$data['pe_liner_amount']			  = strip_comma($totals['pe_liner_amount']);
				$data['self_cert_liner_amount']		  = strip_comma($totals['self_cert_liner_amount']);

                if (isset($seminar_id) && $seminar_id != NULL)
                {
                    $this->seminar_model->save($data, $seminar_id);
                }
                else
                {
                    $this->seminar_model->save($data);
                }
            }
            else
            {
                echo validation_errors();
            }

			echo json_encode($post);

            $campaign['radio']         = 0;
            $campaign['newspaper']     = 0;
            $campaign['catering_cost'] = 0;

            $marketing = $this->seminar_model->get_marketing($id);

			foreach ($marketing->result_array() as $m)
			{
                switch ($m['radio_payment'])
                {
                    case '50/50':
                        $radio_cost = $m['radio_cost'] / 2;
                        break;
                    case'coop':
                        $radio_cost = 0;
                        break;
                    default:
                        $radio_cost = $m['radio_cost'];
                }

				$campaign['radio'] += $radio_cost;

                switch ($m['newspaper_payment'])
                {
                    case '50/50':
                        $newspaper_cost = $m['newspaper_cost'] / 2;
                        break;
                    case 'coop':
                        $newspaper_cost = 0;
                        break;
                    default:
                        $newspaper_cost = $m['newspaper_cost'];
                }

				$campaign['newspaper'] += $newspaper_cost;

				switch ($m['refreshments_payment'])
				{
                    case '50/50':
					    $refreshments_cost = $m['refreshments_cost'] / 2;
                        break;
				    case 'coop':
					    $refreshments_cost = 0;
                        break;
                    default:
					    $refreshments_cost = $m['refreshments_cost'];
				}

				$campaign['catering_cost'] += $refreshments_cost;
			}

            $this->db->select_sum('cost');
            $this->seminar_model->primary_key = 'campaign_id';
            $query = $this->seminar_model->get($id);

            $campaign['location_rental'] = $query['cost'];

            $this->campaign_model->save($campaign, $id);

			$m_cost = $this->campaign_model->get_marketing($id);

			$marketing_cost = array(
                'packets_and_pens'   => $m_cost['packets_and_pens'],
                'fliers'    => $m_cost['fliers'],
                'radio'     => $m_cost['radio'],
                'newspaper' => $m_cost['newspaper'],
                'direct_mail'      => $m_cost['direct_mail'],
                'automated_calls'     => $m_cost['automated_calls']
            );

            $seminar_cost = array(
                'catering_cost' => $m_cost['catering_cost'],
                'location_rental' => $m_cost['location_rental']
            );

			$sum = $this->seminar_model->get_sum_totals($id);

			$seminar_totals = array_merge($sum, $prices);
			$seminar_revenue = $this->totals->seminarRevenue($seminar_totals);

			$totals = array_merge($sum, $seminar_revenue);

            $totals['marketing_total'] = $this->totals->marketingCost($marketing_cost);
            $totals['seminar_total']   = $this->totals->seminarCost($seminar_cost);

            unset($totals['total']);
            unset($totals['campaign_id']);

            $this->total_model->save($totals, $id);

            $params = array('id' => $id, 'campaign_id' => $campaign_id, 'delete' => FALSE);

            $this->load->library('UpdateCampaign', $params);

            $this->updatecampaign->update();
		}
	}

	function duplicate()
	{
		$id 		 = $_GET['id'];
		$campaign_id = $_GET['campaign_id'];

        $insert_id = $this->seminar_model->duplicate_seminar($id);

        redirect('seminar?id=' . $insert_id . '&campaign_id=' . $campaign_id);
	}

	function delete()
	{
        if (isset($_GET['seminar_id']) && $_GET['seminar_id'] !== NULL)
        {
			$id 		 = $_GET['id'];
			$seminar_id  = $_GET['seminar_id'];
			$campaign_id = $_GET['campaign_id'];
			$zoho_id     = $_GET['zoho_id'];

			$this->seminar_model->delete($seminar_id);

			$prices = $this->campaign_model->get_prices($id);
			$sum    = $this->seminar_model->get_sum_totals($id);

			$seminar_totals = array_merge($sum, $prices);

			$seminar_revenue = $this->totals->seminarRevenue($seminar_totals);

			$totals = array_merge($sum, $seminar_revenue);

			unset($totals['total']);
			unset($totals['campaign_id']);

			$this->total_model->save($totals, $id);

			$params = array('id' => $id, 'campaign_id' => $campaign_id, 'delete' => FALSE);

			$this->load->library('UpdateCampaign', $params);

			$this->updatecampaign->update();

			redirect('campaign?id=' . $zoho_id);
		}
	}
}

/* End of file seminar.php */
/* Location: ./application/controllers/seminar.php */