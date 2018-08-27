<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
		$this->load->model('M_permintaan');
	}

	public function index()
	{
		$data['rows'] = $this->M_permintaan->get_data();
		$this->load->view('Laporan/laporan', $data);
	}

}

/* End of file Departemen.php */
/* Location: ./application/controllers/Departemen.php */