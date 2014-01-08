<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar_model extends MY_Model {

	protected $_table_name     = 'seminars';
	protected $_primary_filter = 'intval';
	protected $_order_by       = 'date';
	protected $_timestamps     = FALSE;

    public $primary_key    = 'id';
	public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'trim|required',
        ),
        'contact' => array(
            'field' => 'contact',
            'label' => 'contact',
            'rules' => 'trim|required',
        ),
        'phone' => array(
            'field' => 'phone',
            'label' => 'phone',
            'rules' => 'trim|required',
        ),
        'cost' => array(
            'field' => 'cost',
            'label' => 'cost',
            'rules' => 'trim|strip_comma',
        ),
        'payment' => array(
            'field' => 'payment',
            'label' => 'payment',
            'rules' => 'trim',
        ),
        'street' => array(
            'field' => 'street',
            'label' => 'street',
            'rules' => 'trim|required',
        ),
        'city' => array(
            'field' => 'city',
            'label' => 'city',
            'rules' => 'trim|required',
        ),
        'state' => array(
            'field' => 'state',
            'label' => 'state',
            'rules' => 'trim|required',
        ),
        'zip_code' => array(
            'field' => 'zip_code',
            'label' => 'zip_code',
            'rules' => 'trim|required',
        ),
        'county' => array(
            'field' => 'county',
            'label' => 'county',
            'rules' => 'trim|required',
        ),
        'arrival_time' => array(
            'field' => 'arrival_time',
            'label' => 'arrival_time',
            'rules' => 'trim',
        ),
        'arrival_confirm' => array(
            'field' => 'arrival_confirm',
            'label' => 'arrival_confirm',
            'rules' => 'trim',
        ),
        'coop_contact' => array(
            'field' => 'coop_contact',
            'label' => 'coop_contact',
            'rules' => 'trim',
        ),
        'coop_phone' => array(
            'field' => 'coop_phone',
            'label' => 'coop_phone',
            'rules' => 'trim',
        ),
        'refreshments_cost' => array(
            'field' => 'refreshments_cost',
            'label' => 'refreshment_cost',
            'rules' => 'trim|strip_comma',
        ),
        'refreshments_offered' => array(
            'field' => 'refreshments_offered',
            'label' => 'refreshments_offered',
            'rules' => 'trim',
        ),
        'refreshments_type' => array(
            'field' => 'refreshments_type',
            'label' => 'refreshments_type',
            'rules' => 'trim',
        ),
        'refreshments_payment' => array(
            'field' => 'refreshments_payment',
            'label' => 'refreshments_payment',
            'rules' => 'trim',
        ),
        'radio_station' => array(
            'field' => 'radio_station',
            'label' => 'radio_station',
            'rules' => 'trim',
        ),
        'radio_contact' => array(
            'field' => 'radio_contact',
            'label' => 'radio_contact',
            'rules' => 'trim',
        ),
        'radio_phone' => array(
            'field' => 'radio_phone',
            'label' => 'radio_phone',
            'rules' => 'trim',
        ),
        'radio_cost' => array(
            'field' => 'radio_cost',
            'label' => 'radio_cost',
            'rules' => 'trim|strip_comma',
        ),
        'radio_payment' => array(
            'field' => 'radio_payment',
            'label' => 'radio_payment',
            'rules' => 'trim',
        ),
        'newspaper_name' => array(
            'field' => 'newspaper_name',
            'label' => 'newspaper_name',
            'rules' => 'trim',
        ),
        'newspaper_contact' => array(
            'field' => 'newspaper_contact',
            'label' => 'newspaper_contact',
            'rules' => 'trim',
        ),
        'newspaper_phone' => array(
            'field' => 'newspaper_phone',
            'label' => 'newspaper_phone',
            'rules' => 'trim',
        ),
        'newspaper_cost' => array(
            'field' => 'newspaper_cost',
            'label' => 'newspaper_cost',
            'rules' => 'trim|strip_comma',
        ),
        'newspaper_payment' => array(
            'field' => 'newspaper_payment',
            'label' => 'newspaper_payment',
            'rules' => 'trim',
        ),
        'projector_screen' => array(
            'field' => 'projector_screen',
            'label' => 'projector_screen',
            'rules' => 'trim',
        ),
        'wifi' => array(
            'field' => 'wifi',
            'label' => 'wifi',
            'rules' => 'trim',
        ),
        'cell_reception' => array(
            'field' => 'cell_reception',
            'label' => 'cell_reception',
            'rules' => 'trim',
        ),
        'attendees' => array(
            'field' => 'attendees',
            'label' => 'attendees',
            'rules' => 'trim|required|strip_comma',
        ),
        'num_under_threshold' => array(
            'field' => 'num_under_threshold',
            'label' => 'num_under_threshold',
            'rules' => 'trim|required|strip_comma',
        ),
        'pe_sold' => array(
            'field' => 'pe_sold',
            'label' => 'pe_sold',
            'rules' => 'trim|required|strip_comma',
        ),
        'self_cert_sold' => array(
            'field' => 'self_cert_sold',
            'label' => 'self_cert_sold',
            'rules' => 'trim|required|strip_comma',
        ),
        'pe_containment_sold' => array(
            'field' => 'pe_containment_sold',
            'label' => 'pe_containment_sold',
            'rules' => 'trim|required|strip_comma',
        ),
        'self_cert_containment_sold' => array(
            'field' => 'self_cert_containment_sold',
            'label' => 'self_cert_containment_sold',
            'rules' => 'trim|required|strip_comma',
        ),
		'pe_liner_sold' => array(
			'field' => 'pe_liner_sold',
			'label' => 'pe_liner_sold',
			'rules' => 'trim|required|strip_comma',
		),
		'self_cert_liner_sold' => array(
			'field' => 'self_cert_liner_sold',
			'label' => 'self_cert_liner_sold',
			'rules' => 'trim|required|strip_comma',
		),
        'spill_kits_sold' => array(
            'field' => 'spill_kits_sold',
            'label' => 'spill_kits_sold',
            'rules' => 'trim|required|strip_comma',
        ),
        'inspection_sold' => array(
            'field' => 'inspection_sold',
            'label' => 'inspection_sold',
            'rules' => 'trim|required|strip_comma',
        )
    );

    function get_seminars($campaign_id)
    {
        $this->db->select('seminars.id, seminars.name, city, state, date, street, phone, coop_contact, coop_phone, total');
        $this->db->join('campaigns', 'seminars.campaign_id = campaigns.id');
        $this->db->order_by('date', 'asc');
        $this->db->where('campaigns.id', $campaign_id);

        return $this->db->get($this->_table_name);
    }

    function duplicate_seminar($id)
    {
        $this->db->select('campaign_id, name, contact, phone, street, city, state, zip_code, county, coop_contact, coop_phone, refreshments_offered, refreshments_type, refreshments_payment, radio_station, radio_phone, newspaper_name, newspaper_phone, projector_screen, wifi, cell_reception');
        $seminar = $this->get($id);

        return $this->save($seminar);
    }

    function get_marketing($id)
    {
        $this->db->select('radio_cost, radio_payment, newspaper_cost, newspaper_payment, refreshments_cost, refreshments_payment');
        $this->db->where('campaign_id', $id);

        return	$this->db->get($this->_table_name);
    }

	function get_sum_totals($id)
	{
		$this->db->select('campaign_id');
		$this->db->select_sum('attendees');
		$this->db->select_sum('num_under_threshold');
		$this->db->select_sum('pe_sold');
		$this->db->select_sum('self_cert_sold');
		$this->db->select_sum('pe_containment_sold');
		$this->db->select_sum('self_cert_containment_sold');
		$this->db->select_sum('pe_liner_sold');
		$this->db->select_sum('self_cert_liner_sold');
		$this->db->select_sum('spill_kits_sold');
		$this->db->select_sum('inspection_sold');
		$this->primary_key = 'campaign_id';

		return $this->get($id);
	}

    function get_notes($id)
    {
        $this->db->select('notes');

        return $this->get($id);
    }
}

/* End of file seminar_model.php */
/* Location: ./application/models/seminar_model.php */