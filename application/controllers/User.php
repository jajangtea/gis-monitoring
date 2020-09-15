<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->user_login->cek_login();
	}


	public function index()
	{
		$data = array(
			'title'		=> 'Data User',
			'user' => $this->m_user->lists(),
			'isi' 		=> 'v_user'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}


	public function add()
	{
		$i = $this->input;
		$data = array(
			'username'	=> $i->post('username'),
			'nama_user'	=> $i->post('nama_user'),
			'password'	=> $i->post('password'),
		);
		$this->m_user->add($data);
		$this->session->set_flashdata('pesan', ' Data Berhasil Ditambahkan !');
		redirect('user');
	}

	public function edit($id_user)
	{
		$i = $this->input;
		$data = array(
			'id_user' => $id_user,
			'username'	=> $i->post('username'),
			'nama_user'	=> $i->post('nama_user'),
			'password'	=> $i->post('password'),
		);
		$this->m_user->edit($data);
		$this->session->set_flashdata('pesan', ' Data Berhasil Diedit !');
		redirect('user');
	}

	public function delete($id_user)
	{
		$this->user_login->cek_login();
		$i = $this->input;
		$data = array(
			'id_user' => $id_user,
		);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', ' Data Berhasil Dihapus !');
		redirect('user');
	}
}

/* End of file user.php */
