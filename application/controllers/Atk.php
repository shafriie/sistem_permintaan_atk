<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atk extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_atk');
		if (!$this->session->userdata('is_logged_true')) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['rows'] = $this->M_global->get_data('tbl_atk');
		$this->load->view('Atk/atk', $data);
	}

	public function submit()
	{
		if ($this->input->is_ajax_request()) {
			$action = $this->input->post('action', true);
			if ($action == 'insert') {
				$this->form_validation->set_rules('kode_atk', 'Kode ATK', 'trim|required|numeric|max_length[11]|is_unique[tbl_atk.kode_atk]',array('is_unique'=>'Kode Atk already exist!'));
				$this->form_validation->set_rules('nama_atk', 'Nama ATK', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric|max_length[11]');
				$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required|max_length[20]');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_atk';
					$data = array(
						'kode_atk' 	=> $this->input->post('kode_atk', true), 
						'nama_atk' 	=> $this->input->post('nama_atk', true), 
						'stok' 		=> $this->input->post('stok', true), 
						'satuan' 	=> $this->input->post('satuan', true), 
					);
					$response = $this->M_global->insert($table, $data);
				}
				echo json_encode($response);	
			}
			if($action == 'update'){
				$this->form_validation->set_rules('kode_atk', 'Kode ATK', 'trim|required|numeric|max_length[11]');
				$this->form_validation->set_rules('nama_atk', 'Nama ATK', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric|max_length[11]');
				$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required|max_length[20]');
				if ($this->form_validation->run() === FALSE)
				{
					$response = array('status' => FALSE, 'msg' => validation_errors());
				} 
				else 
				{
					$table = 'tbl_atk';
					$data = array(
						'nama_atk' 	=> $this->input->post('nama_atk', true), 
						'stok' 		=> $this->input->post('stok', true), 
						'satuan' 	=> $this->input->post('satuan', true), 
					);
					$where = array('kode_atk' => $this->input->post('kode_atk', true));
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
			$table = 'tbl_atk';
			$data_array = array('kode_atk' => $id);
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
			$data = array('kode_atk' => $id);
			$table = 'tbl_atk';
			$response = $this->M_global->get_data_where($table, $data);
			echo json_encode($response);
		}
		else
		{
			show_404();
		}
	}

}

/* End of file Atk.php */
/* Location: ./application/controllers/Atk.php */