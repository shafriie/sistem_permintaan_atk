<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	var $level;
	var $username;

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
		$this->load->model('M_permintaan');
		$this->level = $this->session->userdata('sess_level');
		$this->username = $this->session->userdata('sess_username');
	}

	public function index()
	{
		if ($this->level == 1) {
			$data['rows'] = $this->M_permintaan->get_data();
			$this->load->view('Permintaan/permintaan', $data);
		}
		else
		{
			$data['departemens'] = $this->M_global->get_data('tbl_departemen');
			$this->load->view('Permintaan/form', $data);		
		}
	}

	public function change_status()
	{
		if ($this->input->is_ajax_request()) {
			$id_detail = $this->input->post('id_detail', true);
			$status = $this->input->post('status', true);
			$kode_atk = $this->input->post('kode_atk', true);
			if ($status == 4) {
				$stok_request = $this->input->post('stok_request', true);
				$sisa_stok = $this->input->post('sisa_stok', true);

				$new_stok = $sisa_stok - $stok_request;

				$update = $this->M_global->update('tbl_atk', array('stok'=>$new_stok), array('kode_atk'=>$kode_atk));
			}
			$table = 'tbl_permintaan_detail';
			$data_array = array('status' => $status);
			$where = array('id_detail' => $id_detail);
			$upd = $this->M_global->update($table, $data_array, $where);
			echo json_encode($upd);
		}

		else
		{
			show_404();
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {
			$id = base64_decode($this->input->post('id', true));
			$tbl_detail = 'tbl_permintaan_detail';
			$data_where = array('id_detail' => $id);
			$query = $this->M_global->get_data_where($tbl_detail, $data_where);
			echo json_encode($query);
		}
		else
		{
			show_404();
		}
	}

	public function get_data_atk()
	{
		if ($this->input->is_ajax_request()) {
			$data = $this->M_global->get_data('tbl_atk');
			echo json_encode($data);
		}
		else
		{
			show_404();
		}
	}

	public function get_detail_atk()
	{
		if ($this->input->is_ajax_request()) {
			$table = 'tbl_atk';
			$data = array('kode_atk' => $this->input->post('kode_atk'));
			$query = $this->M_global->get_data_where($table, $data);
			echo json_encode($query);
		}
		else
		{
			show_404();
		}
	}

	public function submit()
	{
		$tbl_header = 'tbl_permintaan_header';
		$data_header = array(
			'username' 			 => $this->username,
			'tanggal_permintaan' => $this->input->post('tanggal_permintaan', true),
			'nama' 				 => $this->input->post('nama', true),
			'kd_departemen'		 => $this->input->post('kd_departemen')
		);
		$ins_tbl_header = $this->M_global->insert($tbl_header, $data_header);

		$kode_atk = $this->input->post('kode_atk', true);
		$nama_atk = $this->input->post('nama_atk', true);
		$sisa_stok = $this->input->post('sisa_stok', true);
		$stok_request = $this->input->post('stok_request', true);
		$satuan = $this->input->post('satuan', true);

		for ($i=1; $i <= count($kode_atk); $i++) { 
			$tbl_detail = 'tbl_permintaan_detail';
			$data_detail = array(
				'id_header' 	 => $this->db->insert_id(),
				'kode_atk' 		 => $kode_atk[$i],
				'nama_atk' 		 => $nama_atk[$i],
				'sisa_stok'		 => $sisa_stok[$i],
				'stok_request'	 => $stok_request[$i],
				'satuan'		 => $satuan[$i],
				'status'		 => '1'
			);
			$ins_tbl_detail = $this->M_global->insert($tbl_detail, $data_detail);
		}
		echo "<script>alert('Data berhasil dimasukkan!');</script>";
		redirect('permintaan','refresh');
	}

}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Permintaan.php */