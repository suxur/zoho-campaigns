<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UpdateCampaign {

    private $id;
    private $campaign_id;
    private $delete;

    function __construct($params)
    {
        $this->id           = $params['id'];
        $this->campaign_id  = $params['campaign_id'];
        $this->delete       = $params['delete'];
    }

	function update()
	{
        $CI =& get_instance();

		if ($this->delete == FALSE)
		{
            $CI->load->library('Totals');

            $CI->db->join('campaigns', 'totals.campaign_id = campaigns.id');
            $CI->db->where('totals.campaign_id', $this->id);
            $query = $CI->db->get('totals');

            $row = $query->row_array();

			$seminar_expenses 	= $CI->totals->seminarExpense($row);
			$materials 			= $CI->totals->productCost($row);
			$seminar_revenue 	= $CI->totals->seminarRevenue($row);
			$coop_revenue 		= $CI->totals->coopRevenue($row);
			$sales_revenue		= $CI->totals->salesRevenue($row);

			$difference 		= $seminar_revenue['total'] - $seminar_expenses - $sales_revenue;

            $data = "<Campaigns><row no='1'><FL val='Attendees'>".$row['attendees']."</FL><FL val='Under Threshold'>".$row['num_under_threshold']."</FL><FL val='PEs Sold'>".$row['pe_sold']."</FL><FL val='Self Certs Sold'>".$row['self_cert_sold']."</FL><FL val='PE Containment Sold'>".$row['pe_containment_sold']."</FL><FL val='Self Cert Containment Sold'>".$row['self_cert_containment_sold']."</FL><FL val='PE Liner Sold'>".$row['pe_liner_sold']."</FL><FL val='Self Cert Liner Sold'>".$row['self_cert_liner_sold']."</FL><FL val='Inspections Sold'>".$row['inspection_sold']."</FL><FL val='Spill Kits Sold'>".$row['spill_kits_sold']."</FL><FL val='Total Sales'>".$seminar_revenue['total']."</FL><FL val='- Total Show Expenses'>$ ".number_format($seminar_expenses, 2)."</FL><FL val='Travel/Show Expenses'>$ ".number_format($row['travel_total'], 2)."</FL><FL val='Marketing Expenses'>$ ".number_format($row['marketing_total'], 2)."</FL><FL val='Coop Cut'>$ ".number_format($coop_revenue, 2)."</FL><FL val='- Sales Rep'>$ ".number_format($sales_revenue, 2)."</FL><FL val='Time and Materials'>$ ".number_format($materials, 2)."</FL><FL val='Difference'>".$difference."</FL></row></Campaigns>";

            $this->sendCurlUpdate($data, $this->campaign_id);
		}
		else
		{
			$data = "<Campaigns><row no='1'><FL val='Attendees'>" . 0 . "</FL><FL val='Under Threshold'>" . 0 . "</FL><FL val='PEs Sold'>" . 0 . "</FL><FL val='Self Certs Sold'>" . 0 . "</FL><FL val='PE Containment Sold'>" . 0 . "</FL><FL val='Self Cert Containment Sold'>" . 0 . "</FL><FL val='PE Liner Sold'>" . 0 . "</FL><FL val='Self Cert Liner Sold'>" . 0 . "</FL><FL val='Inspections Sold'>" . 0 . "</FL><FL val='Spill Kits Sold'>" . 0 . "</FL><FL val='Total Sales'>" . 0 . "</FL><FL val='- Total Show Expenses'>" . 0 . "</FL><FL val='Travel/Show Expenses'>" . 0 . "</FL><FL val='Marketing Expenses'>" . 0 . "</FL><FL val='Coop Cut'>" . 0 . "</FL><FL val='- Sales Rep'>" . 0 . "</FL><FL val='Time and Materials'>" . 0 . "</FL><FL val='Difference'>" . 0 . "</FL></row></Campaigns>";
			$this->sendCurlUpdate($data, $this->campaign_id);
		}

	}

	function sendCurlUpdate($data, $campaign_id)
	{
		/* Constant Declarations */
		$url = "https://crm.zoho.com/crm/private/xml/Campaigns/updateRecords";

		/* user related parameter */
		$scope = "crmapi";
		$authtoken = "a20cd80e5f5e593fdada4b72476a9ff1";
		
		$param = "authtoken=" . $authtoken . "&scope=" . $scope . "&id=" . $campaign_id . "&xmlData=" . $data;

		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_handle, CURLOPT_FRESH_CONNECT, true); //No caching
		curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl_handle, CURLOPT_MAXREDIRS, 1);

		/* set POST method */
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		/* add POST fields parameters */
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $param);

		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);
	}
}

/* End of file UpdateCampaign.php */
/* Location: ./application/libraries/UpdateCampaign.php */