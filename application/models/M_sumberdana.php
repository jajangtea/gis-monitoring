<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_sumberdana extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_sumberdana');
		$this->db->order_by('id_sumberdana', 'desc');
		return $this->db->get()->result();		
	}

	public function detail($id_sumberdana)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumberdana');
		$this->db->where('id_sumberdana', $id_sumberdana);
		return $this->db->get()->row();		
	}

	public function add($data)
	{
		$this->db->insert('tbl_sumberdana', $data);
		
	}

	public function edit($data)
	{
		$this->db->where('id_sumberdana', $data['id_sumberdana']);
		$this->db->update('tbl_sumberdana', $data);
		
	}

	public function delete($data)
	{
		$this->db->where('id_sumberdana', $data['id_sumberdana']);
		$this->db->delete('tbl_sumberdana', $data);
		
	}

}

/* End of file M_sumberdana.php */
