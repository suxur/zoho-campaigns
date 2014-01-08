<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Total_model extends MY_Model {

    protected $_table_name     = 'totals';
    protected $_primary_filter = 'intval';
    protected $_order_by       = 'id';
    protected $_timestamps     = FALSE;

    public $primary_key = 'campaign_id';

    public $rules = array();
}

/* End of file total_model.php */
/* Location: ./application/models/total_model.php */