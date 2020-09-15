<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->order_by('id_jenis', 'desc');
		return $this->db->get()->result();		
	}

	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->get()->row();		
	}

	

	public function add($data)
	{
		$this->db->insert('tbl_jenis', $data);
		
	}

	public function edit($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']);
		$this->db->update('tbl_jenis', $data);
		
	}

	public function delete($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']);
		$this->db->delete('tbl_jenis', $data);
		
	}

}

/* End of file M_jenis.php */
