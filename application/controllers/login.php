<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$redirect = $this->session->userdata('url');

		$data = array(
			'title'    => 'Login',
			'page'     => 'login_view',
			'nav'      => 'login_nav',
			'redirect' => $redirect
		);
		
		$this->load->view('layout', $data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */