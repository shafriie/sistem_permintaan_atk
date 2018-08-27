<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_logged_true')) {
			redirect('dashboard','refresh');
		}
	}

	public function index()
	{
		$this->load->view('Login/login');		
	}

	public function submit()
	{
		$table = 'tbl_login';
		$data_array = array(
			'username' => $this->input->post('username', true)
		);
		$query = $this->M_global->get_data_where($table, $data_array);
		$num_rows = count($query);
		if ($num_rows) {
			$data_array1 = array(
				'username' => $this->input->post('username', true),
				'password' => $this->input->post('password', true),
			);
			$query1 = $this->M_global->get_data_where($table, $data_array1);
			$num_rows1 = count($query1);
			if ($num_rows1 > 0) {

				$d = array('username' => $query1->username); 
				$dats = $this->M_global->get_data_where('tbl_karyawan', $d);

				$array = array(
					'is_logged_true'  => true,
					'sess_username'   => $query1->username,
					'sess_level'	  => $query1->level,
					'sess_nama'		  => $dats->nama,
					'sess_departemen' => $dats->kd_departemen,
 				);
				
				$this->session->set_userdata( $array );
				redirect('dashboard','refresh');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Password anda salah. Silahkan coba lagi!');
				$this->load->view('Login/login');
			}
		}
		else
		{
			$this->session->set_flashdata('msg', 'Username tidak ada di sistem kami!');
			$this->load->view('Login/login');
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */