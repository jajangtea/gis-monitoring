<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programmer extends CI_Controller {

	public function index()
	{
		$data = array(
			'title'=>'Programmer',
			'isi' => 'v_programmer'
		 );
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

}

/* End of file Programmer.php */
