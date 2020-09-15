<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sumberdana extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sumberdana');
		$this->user_login->cek_login();
	}
	

	public function index()
	{
		$data = array(
			'title'		=>'Data Sumber Dana',
			'sumberdana'=> $this->m_sumberdana->lists(),
			'isi' 		=> 'v_sumberdana'
		 );
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	
	public function add()
	{
			$config['upload_path']   = './icon/';
            $config['allowed_types'] = 'png';
            $config['max_size']      = 1000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('icon')) {
				$this->session->set_flashdata('error','File Di Upload Tidak Sesuai Dengai Ketentuan !!');
				redirect('jenis');			
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './icon/'.$upload_data['uploads']['file_name'];				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
								'sumber_dana'	=> $i->post('sumber_dana'),
								'icon'	=> $upload_data['uploads']['file_name'],
	                        	);
	            $this->m_sumberdana->add($data);
	            $this->session->set_flashdata('sukses',' Data Berhasil Ditambahkan !');
	            redirect('sumberdana');		           
			}				
	}

	public function edit($id_sumberdana)
	{
		$config['upload_path']   = './icon/';
            $config['allowed_types'] = 'png';
            $config['max_size']      = 1000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('icon')) {
				$i = $this->input;
	            $data = array(
								'id_sumberdana' => $id_sumberdana,
	            				'sumber_dana'	=> $i->post('sumber_dana'),
	                        	);
	            $this->m_sumberdana->edit($data);
	            $this->session->set_flashdata('sukses',' Data Berhasil Diedit !');
	            redirect('sumberdana');				
			}else{
						//hapus gambar
				$sumberdana=$this->m_sumberdana->detail($id_sumberdana);
				if ($sumberdana->icon != "") {
					unlink('./icon/'.$sumberdana->icon);
				}
				//===========================
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './icon/'.$upload_data['uploads']['file_name'];				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
								'id_sumberdana'	=>$id_sumberdana,
								'sumber_dana'	=> $i->post('sumber_dana'),
								'icon'	=> $upload_data['uploads']['file_name'],
	                        	);
	            $this->m_sumberdana->edit($data);
	            $this->session->set_flashdata('sukses',' Data Berhasil Ditambahkan !');
	            redirect('sumberdana');
			}	
					
	}

	public function delete($id_sumberdana)
	{
				$this->user_login->cek_login();
			//hapus gambar
			$sumberdana=$this->m_sumberdana->detail($id_sumberdana);
			if ($sumberdana->icon != "") {
				unlink('./icon/'.$sumberdana->icon);
			}
			//===========================
				$i = $this->input;
	            $data = array(
								'id_sumberdana' => $id_sumberdana,
	                        	);
	            $this->m_sumberdana->delete($data);
	            $this->session->set_flashdata('sukses',' Data Berhasil Dihapus !');
	            redirect('sumberdana');		
	}

}

/* End of file Sumberdana.php */

