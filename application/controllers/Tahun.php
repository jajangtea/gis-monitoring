<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tahun');
		$this->user_login->cek_login();
	}
	

	public function index()
	{
		$data = array(
			'title'		=>'Data Tahun',
			'tahun'		=> $this->m_tahun->lists(),
			'isi' 		=> 'v_tahun'
		 );
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array('tahun' => $this->input->post('tahun'));
		$this->m_tahun->add($data);
		$this->session->set_flashdata('sukses',' Data Berhasil Input !');
		redirect('tahun');
	}

	public function edit($id_tahun)
	{
		$data = array(
						'id_tahun'	=> $id_tahun,
						'tahun'		 => $this->input->post('tahun')
					);
		$this->m_tahun->edit($data);
		$this->session->set_flashdata('sukses',' Data Berhasil Input !');
		redirect('tahun');
	}

	public function delete($id_tahun)
	{
		$this->user_login->cek_login();
		$data = array('id_tahun' => $id_tahun );
		$this->m_tahun->delete($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!');
		redirect('tahun');
	}

}

/* End of file Tahun.php */
