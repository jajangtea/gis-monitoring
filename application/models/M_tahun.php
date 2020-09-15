<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahun extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_tahun');
		$this->db->order_by('tahun', 'desc');
		return $this->db->get()->result();		
	}

	public function detail($id_tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_tahun');
		$this->db->where('id_tahun', $id_tahun);
		return $this->db->get()->row();		
	}

	

	public function add($data)
	{
		$this->db->insert('tbl_tahun', $data);
		
	}

	public function edit($data)
	{
		$this->db->where('id_tahun', $data['id_tahun']);
		$this->db->update('tbl_tahun', $data);
		
	}

	public function delete($data)
	{
		$this->db->where('id_tahun', $data['id_tahun']);
		$this->db->delete('tbl_tahun', $data);
		
	}

}

/* End of file M_tahun.php */
