<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['atk'] = $this->M_global->get_num_rows('tbl_atk');
		$data['karyawan'] = $this->M_global->get_num_rows('tbl_karyawan');
		$data['departemen'] = $this->M_global->get_num_rows('tbl_departemen');
		$data['detail'] = $this->M_global->get_num_rows('tbl_permintaan_detail');
		$this->load->view('Dashboard/dashboard', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */