<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_Password extends MY_Controller {

	public function index()
	{
		$this->load->view('Login/forgot_password');		
	}

	public function submit()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_username', form_error('username'));
			redirect('forgot_password','refresh');
		} 

		else 
		{
			$tbl = 'tbl_login';
			$data = array('username' => $this->input->post('username', true));
			$query = $this->M_global->get_data_where($tbl, $data);
			if (count($query) > 0) {
				$username = $this->base64url_encode($this->input->post('username', true));
				redirect('forgot_password/change/'.$username,'refresh');
			}
			else
			{
				$this->session->set_flashdata('error_username', 'Username salah. Silahkan coba lagi!');
				$this->load->view('Login/forgot_password');
			}
		}
	}

	public function change($val)
	{
		$data['username'] = $val;
		$this->load->view('Login/change_password', $data);
	}

	public function submit_password($username)
	{
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[6]|max_length[200]');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'trim|required|matches[new_password]');
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error_new_password', form_error('new_password'));
			$this->session->set_flashdata('error_retype_password', form_error('retype_password'));
			$this->session->set_flashdata('error_old_password', form_error('old_password'));
			
			$data['username'] = $username;
			$this->load->view('Login/change_password', $data);
		} 
		else 
		{
			$primaryKey = $this->base64url_decode($username);
			$old_password = $this->input->post('old_password', true);
			$sw = $this->M_global->get_data_where('tbl_login',array('username'=>$primaryKey));

			if ($old_password == $sw->password) {
				$table = 'tbl_login';
				$data = array('password' => $this->input->post('new_password', true));
				$where = array('username' => $primaryKey);
				$upd = $this->M_global->update($table, $data, $where);
				echo "<script>alert('Berhasil merubah password. Silahkan gunakan password yang baru!');</script>";
				redirect('login','refresh');
			}
			else
			{
				$this->session->set_flashdata('error_old_password', 'Maaf password lama yg anda masukkan salah!');
				$data['username'] = $username;
				$this->load->view('Login/change_password', $data);
			}
		}
	}

}

/* End of file Forgot_Password.php */
/* Location: ./application/controllers/Forgot_Password.php */