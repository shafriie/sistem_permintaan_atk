<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		$username = $this->session->userdata('sess_username');
		$level = $this->session->userdata('sess_level');
		if ($level == 1) {
			$data['departemens'] = $this->M_global->get_data('tbl_departemen');
			$data['rows'] = $this->M_global->get_data_general_affair($username);
		}
		else
		{
			$data['departemens'] = $this->M_global->get_data('tbl_departemen');
			$data['rows'] = $this->M_global->get_data_karyawan($username);
		}
		$this->load->view('Profile/profile', $data);
	}

	public function submit()
	{
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
			// $response = array('status' => FALSE, 'msg' => validation_errors());
			
			echo '<pre style="color:red;font-weight:bold;font-size:1.5em">';
			print_r(validation_errors());
			echo "</pre>";
			echo '<a href="'.site_url('profile').'">Back to profile</a>';
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

			echo "<script>alert('Successfully update profile!');</script>";
			redirect('profile','refresh');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */