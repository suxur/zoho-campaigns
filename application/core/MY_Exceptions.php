<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {

    function __construct()
    {
        parent::__construct();
    }

    function log_exception($severity, $message, $filepath, $line)
    {
        $CI =& get_instance();
        $severity = ( ! isset($this->levels[$severity])) ? $severity : $this->levels[$severity];

        log_message('error', 'Severity: '.$severity.'  --> '.$message. ' '.$filepath.' '.$line, TRUE);

        if ($CI->config->item('base_url') == 'http://test.zoho.agcompliance.com')
        {
            $CI->load->library('email');

            $uri = $CI->uri->uri_string();

            $CI->email->from('error@zoho.agcompliance.com', 'Zoho: Campaigns - Error');
            $CI->email->to('joshua.payne@agcompliance.com');

            $CI->email->subject('Zoho: Campaign - Error [severity: '.$severity.']');
            $CI->email->message('Severity: '.$severity.'  --> '.$message. ' '.$filepath.' '.$line."\n"."From URL: ".$uri);

            $CI->email->send();
        }
    }
}

/* End of file MY_Exceptions.php */
/* Location: ./application/core/MY_Exceptions.php */