<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['departemens'] = $this->M_global->get_data('tbl_departemen');
		$data['rows'] = $this->M_global->get_data_karyawan();
		$this->load->view('Karyawan/karyawan', $data);
	}

	public function submit()
	{
		if ($this->input->is_ajax_request()) {
			$action = $this->input->post('action', true);
			if ($action == 'insert') {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|is_unique[tbl_login.username]',array('is_unique'=>'Username already exist!'));
				$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[200]');
				$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|max_length[70]');
				$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('agama', 'Agama', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_login';
					$data = array(
						'username' 	=> $this->input->post('username', true), 
						'password' 	=> $this->input->post('password', true), 
						'level' 	=> '2', 
					);
					$response1 = $this->M_global->insert($table, $data);

					$table2 = 'tbl_karyawan';
					$data2 = array(
						'username' 		=> $this->input->post('username', true), 
						'nama' 			=> $this->input->post('nama', true), 
						'kd_departemen' => $this->input->post('kd_departemen', true), 
						'jenis_kelamin' => $this->input->post('jenis_kelamin', true), 
						'tempat_lahir' 	=> $this->input->post('tempat_lahir', true), 
						'tanggal_lahir' => $this->input->post('tanggal_lahir', true), 
						'agama' 		=> $this->input->post('agama', true), 
						'alamat' 		=> $this->input->post('alamat', true), 
						'level' 		=> '2', 
					);

					$response2 = $this->M_global->insert($table2, $data2);
				}
				echo json_encode( array('status' => TRUE, 'msg' => 'You succesfully insert') );
			}
			if($action == 'update'){
				$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[200]');
				$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|max_length[70]');
				$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('agama', 'Agama', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_login';
					$data = array(
						'password' 	=> $this->input->post('password', true), 
					);
					$where = array('username' => $this->input->post('username', true));
					$response1 = $this->M_global->update($table, $data, $where);	

					$table2 = 'tbl_karyawan';
					$data2 = array(
						'nama' 			=> $this->input->post('nama', true), 
						'kd_departemen' => $this->input->post('kd_departemen', true), 
						'jenis_kelamin' => $this->input->post('jenis_kelamin', true), 
						'tempat_lahir' 	=> $this->input->post('tempat_lahir', true), 
						'tanggal_lahir' => $this->input->post('tanggal_lahir', true), 
						'agama' 		=> $this->input->post('agama', true), 
						'alamat' 		=> $this->input->post('alamat', true), 
					);
					$where2 = array('username' => $this->input->post('username', true));
					$response2 = $this->M_global->update($table2, $data2, $where2);	
				}
				echo json_encode( array('status' => TRUE, 'msg' => 'You succesfully update') );
			}
		}
		else
		{
			show_404();
		}
	}

	public function delete()
	{
		if ($this->input->is_ajax_request()) {
			$valueID = $this->input->post('id');
			$id = base64_decode($valueID);
			$table = 'tbl_login';
			$data_array = array('username' => $id);
			$response1 = $this->M_global->delete($table, $data_array);
			
			$table2 = 'tbl_karyawan';
			$data_array2 = array('username' => $id);
			$response2 = $this->M_global->delete($table2, $data_array2);
			
			echo json_encode( array('status' => TRUE, 'msg' => 'You succesfully deleted') );
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
			$response = $this->M_global->get_data_karyawan($id);
			echo json_encode($response);
		}
		else
		{
			show_404();
		}
	}
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */