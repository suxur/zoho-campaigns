<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	private $auth           = 0;
	private $userType       = 0;
	private $id             = 0;
	public  $firstName      = "";
	public  $lastName       = "";
	public  $fullName       = "";
	public  $email          = "";
	public  $error          = "";
	
	function __construct()
	{
		$CI =& get_instance();

		$CI->load->library('session');
		$CI->load->helper('url');	

		
	}

	function auth()
	{
		$this->auth = 0;
	}

	function checkAuth($checkAccess = FALSE)
	{
		$CI =& get_instance();

		$notice = "";

		if (isset($_COOKIE['siteUser']) && isset($_COOKIE['sitePassword']))
			if (!$this->verify($_COOKIE['siteUser'], $_COOKIE['sitePassword'])) $notice = $this->error;

		if (isset($_POST['siteUser']) && $this->auth != 1)
			$notice = $this->login($_POST['siteUser'], $_POST['sitePassword']);

		if (isset($_GET['error']) && $_GET['error'] == 'login' && $this->auth != 1) $notice = "Could not verify user.";
		
		if ($checkAccess == TRUE)
		{
			if ($this->auth == 0)
			{
				$data = array('url' => $_SERVER['REQUEST_URI']);

				$CI->session->set_userdata($data);
	
				redirect(base_url());
			}
		}

		if ($notice != "") return "<h3 class='error'>" . $notice . "</h3>";
		
		return "";
	}	

	function verify($user, $password)
	{
		$CI =& get_instance();
		$authDB = $CI->load->database('authDB', TRUE);

		$authDB->like('email', $user, 'none');
		$authDB->like('password', $password, 'none');
		$query = $authDB->get('users');
		
		if ($query->result()) 
		{
			$user = $query->row();
			$row  = $query->num_rows();

			if ($row == 1 && $user->enabled == 1)
			{
				$this->auth 				= 1;
				$this->userType             = $user->userType;
				$this->id                   = $user->id;
				$this->firstName            = $user->firstName;
				$this->lastName             = $user->lastName;
				$this->fullName             = $user->firstName ." ". $user->lastName;
				$this->email                = $user->email;

				return TRUE;
			}
			else
			{
				$this->auth = 0;

				if ($row == 0)
				{
					$this->error = "Could not verify user";
				}
				elseif ($row > 1)
				{
					$this->error = "Multiple users have this same account information. Please call 855-755-7526 for more information.";
				}
				elseif ($user->enabled != 1)
				{
					$this->error = "Your account has been temporarily disabled.";
				}
				else
				{
					$this->error = "There was an error logging you in.";
				}

				return FALSE;
			}
		}
	}

	function login($siteUser, $sitePassword, $encrypted = 0)
	{
		$output = "";
		$time   = time() + (86400 * 365 * 10);
		$url    = ".agcompliance.com";
		
		$encrypted == 1 ? $password = $sitePassword : $password = md5($sitePassword);
		
		if (!$this->verify($siteUser, $password))
		{
			$output = $this->error;
		}
		else
		{
			if ($this->auth == 1)
			{
				if (!setcookie("siteUser", "$siteUser", $time, "/", $url) || !setcookie("sitePassword", "$password", $time, "/", $url))
				{
					$output .= "Error trying to log you in.";
				}
			}
		}
		
		return $output;
	}
}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */