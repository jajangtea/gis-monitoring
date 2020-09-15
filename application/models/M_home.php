<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function sumberdana($tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_kegiatan');
		$this->db->join('tbl_sumberdana', 'tbl_sumberdana.id_sumberdana = tbl_kegiatan.id_sumberdana', 'left');
		$this->db->group_by('tbl_kegiatan.id_sumberdana');
		$this->db->where('tahun', $tahun);				
		return $this->db->get()->result();		
	}

	public function kegiatan_pertahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_kegiatan');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kegiatan.id_jenis', 'left');
		$this->db->join('tbl_sumberdana', 'tbl_sumberdana.id_sumberdana = tbl_kegiatan.id_sumberdana', 'left');
		$this->db->where('tahun', $tahun);
		return $this->db->get()->result();	
	}

	public function kegiatan_sumberdana($tahun,$id_sumberdana)
	{
		$this->db->select('*');
		$this->db->from('tbl_kegiatan');
		$this->db->join('tbl_sumberdana', 'tbl_sumberdana.id_sumberdana = tbl_kegiatan.id_sumberdana', 'left');
		$this->db->where('tahun', $tahun);
		$this->db->where('tbl_kegiatan.id_sumberdana', $id_sumberdana);
		return $this->db->get()->result();		
	}

	public function detailsumberdana($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_sumberdana');
		$this->db->where('id_sumberdana', $id_jenis);
		return $this->db->get()->row();
		
		
	}

	public function tahun()
	{
		$this->db->select('*');
		$this->db->from('tbl_kegiatan');
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'desc');	
		return $this->db->get()->result();
			
	}
	
}

/* End of file M_home.php */
