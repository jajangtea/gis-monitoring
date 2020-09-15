<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->model('M_login');
	}

	//fungsi login

	public function login($username, $password)
	{
		$check = $this->CI->m_login->login($username, $password);
		//jika ada data login maka session login dibuat

		if ($check) {
			$id_user    = $check->id_user;
			$nama_user  = $check->nama_user;
			$username 	= $check->username;
			//buat session
			$this->CI->session->set_userdata('id_user', $id_user);
			$this->CI->session->set_userdata('nama_user', $nama_user);
			$this->CI->session->set_userdata('username', $username);
			// redirect ke halaman admin

			redirect(base_url('home'), 'refresh');
			# code...
		} else {
			$this->CI->session->set_flashdata('pesan', 'Username Dan Password Tidak Ditemukan');
			//redirect(base_url('login'),'refresh');
		}
	}

	public function cek_login()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('pesan', 'Anda Belum Login');
			redirect(base_url('login'), 'refresh');
			# code...
		}
	}

	public function logout()
	{
		//membuang semua session yg telah dibuat tadi saat login berhasil
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama_user');
		$this->CI->session->unset_userdata('username');
		// setelah session di unset maka redirec ke halaman login
		$this->CI->session->set_flashdata('pesan', 'Anda Berhasil Logout');
		redirect(base_url('login'), 'refresh');
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
