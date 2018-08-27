<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan extends CI_Model {

	public function get_data()
	{
		$sess_level = $this->session->userdata('sess_level');
		$sess_username = $this->session->userdata('sess_username');
		if ($sess_level == 2) {
			$this->db->select('header.id_header, header.nama, header.tanggal_permintaan, d.nama_departemen, detail.id_detail, detail.kode_atk, detail.nama_atk, detail.sisa_stok, detail.stok_request, detail.satuan, detail.status');
			$this->db->from('tbl_permintaan_header as header');
			$this->db->join('tbl_permintaan_detail as detail', 'header.id_header = detail.id_header');
			$this->db->join('tbl_departemen d', 'd.kd_departemen = header.kd_departemen');
			$this->db->where('header.username', $sess_username);
			$data = $this->db->get()->result();	
		}
		else
		{
			$this->db->select('header.id_header, header.nama, header.tanggal_permintaan, d.nama_departemen, detail.id_detail, detail.kode_atk, detail.nama_atk, detail.sisa_stok, detail.stok_request, detail.satuan, detail.status');
			$this->db->from('tbl_permintaan_header as header');
			$this->db->join('tbl_permintaan_detail as detail', 'header.id_header = detail.id_header');
			$this->db->join('tbl_departemen d', 'd.kd_departemen = header.kd_departemen');
			$data = $this->db->get()->result();
		}
		return $data;
	}	
}

/* End of file M_permintaan.php */
/* Location: ./application/models/M_permintaan.php */