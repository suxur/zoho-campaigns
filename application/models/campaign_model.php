<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_model extends MY_Model {

	protected $_table_name     = 'campaigns';
	protected $_primary_filter = 'intval';
	protected $_order_by       = 'id';
	protected $_timestamps     = FALSE;

    public $primary_key    = 'id';
	public $rules = array(
		'zoho_id' => array(
			'field' => 'zoho_id',
			'label' => 'zoho_id',
			'rules' => 'trim|required'
		),
		'campaign_id' => array(
			'field' => 'campaign_id',
			'label' => 'campaign_id',
			'rules' => 'trim|required'
		),
		'status' => array(
			'field' => 'status',
			'label' => 'status',
			'rules' => 'trim|required'
		),
		'name' => array(
			'field' => 'name',
			'label' => 'name',
			'rules' => 'trim|required'
		),
		'coop_commission' => array(
			'field' => 'coop_commission',
			'label' => 'coop_commission',
			'rules' => 'trim|required'
		),
		'days_on_road' => array(
			'field' => 'days_on_road',
			'label' => 'days_on_road',
			'rules' => 'trim|required'
		),
		'num_employees' => array(
			'field' => 'num_employees',
			'label' => 'num_employees',
			'rules' => 'trim|required'
		),
		'hotel_cost' => array(
			'field' => 'hotel_cost',
			'label' => 'hotel_cost',
			'rules' => 'trim|required|strip_comma'
		),
		'catering_cost' => array(
			'field' => 'catering_cost',
			'label' => 'catering_cost',
			'rules' => 'trim|required|strip_comma'
		),
		'location_rental' => array(
			'field' => 'location_rental',
			'label' => 'location_rental',
			'rules' => 'trim|required|strip_comma'
		),
		'est_vehicle_miles' => array(
			'field' => 'est_vehicle_miles',
			'label' => 'est_vehicle_miles',
			'rules' => 'trim|required|strip_comma'
		),
		'vehicle_cost' => array(
			'field' => 'vehicle_cost',
			'label' => 'vehicle_cost',
			'rules' => 'trim|required|strip_comma'
		),
		'plane_ticket_cost' => array(
			'field' => 'plane_ticket_cost',
			'label' => 'plane_ticket_cost',
			'rules' => 'trim|required|strip_comma'
		),
		'packets_and_pens' => array(
			'field' => 'packets_and_pens',
			'label' => 'packets_and_pens',
			'rules' => 'trim|required|strip_comma'
		),
		'fliers' => array(
			'field' => 'fliers',
			'label' => 'fliers',
			'rules' => 'trim|required|strip_comma'
		),
		'radio' => array(
			'field' => 'radio',
			'label' => 'radio',
			'rules' => 'trim|required|strip_comma'
		),
		'newspaper' => array(
			'field' => 'newspaper',
			'label' => 'newspaper',
			'rules' => 'trim|required|strip_comma'
		),
		'direct_mail' => array(
			'field' => 'direct_mail',
			'label' => 'direct_mail',
			'rules' => 'trim|required|strip_comma'
		),
		'automated_calls' => array(
			'field' => 'automated_calls',
			'label' => 'automated_calls',
			'rules' => 'trim|required|strip_comma'
		),
		'self_cert_price' => array(
			'field' => 'self_cert_price',
			'label' => 'self_cert_price',
			'rules' => 'trim|required'
		),
		'pe_price' => array(
			'field' => 'pe_price',
			'label' => 'pe_price',
			'rules' => 'trim|required'
		),
		'self_cert_containment_price' => array(
			'field' => 'self_cert_containment_price',
			'label' => 'self_cert_containment_price',
			'rules' => 'trim|required'
		),
		'pe_containment_price' => array(
			'field' => 'pe_containment_price',
			'label' => 'pe_containment_price',
			'rules' => 'trim|required'
		),
		'inspection_price' => array(
			'field' => 'inspection_price',
			'label' => 'inspection_price',
			'rules' => 'trim|required'
		),
		'spill_kit_price' => array(
			'field' => 'spill_kit_price',
			'label' => 'spill_kit_price',
			'rules' => 'trim|required'
		)
	);

    function get_prices($id)
    {
        $this->db->select('self_cert_price, pe_price, self_cert_containment_price, pe_containment_price, spill_kit_price, inspection_price');

        return $this->get($id);
    }

    function get_marketing($id)
    {
        $this->db->select('location_rental, catering_cost, packets_and_pens, fliers, radio, newspaper, direct_mail, automated_calls');

        return $this->get($id);
    }
}

/* End of file campaign_model.php */
/* Location: ./application/models/campaign_model.php */