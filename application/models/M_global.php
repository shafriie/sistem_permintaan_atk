<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

	public function get_num_rows($table)
	{
		$data = $this->db->get($table)->num_rows();
		return $data;
	}

	public function get_data_general_affair($username='')
	{
		$this->db->select('karyawan.*, login.password, departemen.nama_departemen');
		$this->db->from('tbl_login as login');
		$this->db->join('tbl_karyawan as karyawan', 'karyawan.username = login.username');
		$this->db->join('tbl_departemen as departemen', 'departemen.kd_departemen = karyawan.kd_departemen');
		$this->db->where('login.username', $username);
		$data = $this->db->get()->row();
		return $data;
	}

	public function get_data_karyawan($username='')
	{
		$this->db->select('karyawan.*, login.password, departemen.nama_departemen');
		$this->db->from('tbl_login as login');
		$this->db->join('tbl_karyawan as karyawan', 'karyawan.username = login.username');
		$this->db->join('tbl_departemen as departemen', 'departemen.kd_departemen = karyawan.kd_departemen');
		$this->db->where('login.level', '2');
		if ($username != '') {
			$this->db->where('login.username', $username);
			$data = $this->db->get()->row();
		}
		else
		{
			$data = $this->db->get()->result();	
		}
		
		return $data;
	}

	public function get_data($table='')
	{
		$data = $this->db->get($table)->result();
		return $data;
	}	

	public function get_data_where($table='', $data_array)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($data_array);
		$data = $this->db->get()->row();
		return $data;
	}

	public function insert($table='', $data_array)
	{
		$this->db->insert($table, $data_array);
		if ($this->db->affected_rows() === 1) {
			$response = array('status' => TRUE, 'msg' => 'You succesfully insert');
		}
		else
		{
			$response = array('status' => FALSE);
		}
		return $response;
	}

	public function update($table='', $data_array, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data_array);
		if ($this->db->affected_rows() === 1) {
			$response = array('status' => TRUE, 'msg' => 'You succesfully update');
		}
		else
		{
			$response = array('status' => FALSE);
		}
		return $response;
	}

	public function delete($table='', $data_array)
	{
		$this->db->where($data_array);
		$this->db->delete($table);
		if ($this->db->affected_rows() === 1) {
			$response = array('status' => TRUE, 'msg' => 'You succesfully delete');
		}
		else
		{
			$response = array('status' => FALSE);
		}
		return $response;	
	}

}

/* End of file M_global.php */
/* Location: ./application/models/M_global.php */