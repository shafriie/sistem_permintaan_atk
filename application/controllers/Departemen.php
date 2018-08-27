<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['rows'] = $this->M_global->get_data('tbl_departemen');
		$this->load->view('Departemen/departemen', $data);
	}

	public function submit()
	{
		if ($this->input->is_ajax_request()) {
			$action = $this->input->post('action', true);
			if ($action == 'insert') {
				$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'trim|required|max_length[50]|is_unique[tbl_departemen.kd_departemen]',array('is_unique'=>'Kode Departemen already exist!'));
				$this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('gedung', 'Gedung', 'trim|required|max_length[40]');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_departemen';
					$data = array(
						'kd_departemen' 	=> $this->input->post('kd_departemen', true), 
						'nama_departemen' 	=> $this->input->post('nama_departemen', true), 
						'gedung' 			=> $this->input->post('gedung', true), 
					);
					$response = $this->M_global->insert($table, $data);
				}
				echo json_encode($response);	
			}
			if($action == 'update'){
				$this->form_validation->set_rules('kd_departemen', 'Kode Departemen', 'trim|required|max_length[50]');
				$this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('gedung', 'Gedung', 'trim|required|max_length[40]');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_departemen';
					$data = array(
						'nama_departemen' 	=> $this->input->post('nama_departemen', true), 
						'gedung' 			=> $this->input->post('gedung', true), 
					);
					$where = array('kd_departemen' => $this->input->post('kd_departemen', true));
					$response = $this->M_global->update($table, $data, $where);
				}
				echo json_encode($response);
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
			// echo $id;
			$table = 'tbl_departemen';
			$data_array = array('kd_departemen' => $id);
			$response = $this->M_global->delete($table, $data_array);
			echo json_encode($response);
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
			$data = array('kd_departemen' => $id);
			$table = 'tbl_departemen';
			$response = $this->M_global->get_data_where($table, $data);
			echo json_encode($response);
		}
		else
		{
			show_404();
		}
	}

}

/* End of file Departemen.php */
/* Location: ./application/controllers/Departemen.php */