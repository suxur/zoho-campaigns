<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	function __construct()
	{
		parent::__construct();

        $this->load->model('seminar_model');
	}

	function index()
	{
        if (isset($_GET['id']) && $_GET['id'] != '')
        {
            $id = $_GET['id'];

            $notes = $this->seminar_model->get_notes($id);
            if ($notes != NULL)
            {
                $notes = json_decode($notes['notes'], TRUE);

                for ($i = 0; $i < count($notes); $i++)
                {
                    echo '<div class="notes">';
                    echo '<p class="note-head"><i class="icon-file"></i> <strong>' . $notes[$i]['name'] . '&nbsp;&nbsp;<small>' . date('m/d/Y - h:i A', $notes[$i]['date']) . '</small></strong></p>';
                    echo '<p>' . str_replace("\r\n", "<br/>", $notes[$i]['msg']) . '</p>';
                    echo '</div>';
                }
            }
        }
	}

	function save()
	{
		if (isset($_POST['id']) && $_POST['id'] !== NULL)
		{
			$id  = $_POST['id'];
			$msg = $_POST['msg'];
			$msg = preg_replace("/\n/", "<br>", $msg);
			$msg = preg_replace("/\t/", "&nbsp;&nbsp;&nbsp;&nbsp;", $msg);

			$temp = array(
				'name' => $this->auth->fullName,
				'date' => time(),
				'msg'  => $msg
			);

			$notes = $this->seminar_model->get_notes($id);

			if (($notes = json_decode($notes['notes'], TRUE)) === NULL) $notes = array();

			array_unshift($notes, $temp);

			$data['notes'] = json_encode($notes);

			$insert_id = $this->seminar_model->save($data, $id);

			echo ($insert_id == $id) ? json_encode(TRUE) : json_encode(FALSE);
		}
	}
}

/* End of file notes.php */
/* Location: ./application/controllers/notes.php */