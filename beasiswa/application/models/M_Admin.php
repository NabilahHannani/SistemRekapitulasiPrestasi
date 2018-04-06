<?php

class M_Admin extends CI_Model{

	public $table = 'tbl_user';
	public $table1 = 'tbl_mahasiswa';

	function check_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$user = $this->db->get('tbl_user')->row_array();
		return $user;
	}

	function update(){
		$data = array(
		'nim' 			=> $this->input->post('nim',TRUE),
		'nama_mahasiswa'	=> $this->input->post('nama_mahasiswa',TRUE),
		'jurusan'	=> $this->input->post('jurusan',TRUE),
		'JK' 			=> $this->input->post('JK',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'tempat_lahir' 			=> $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' 		=> 	$this->input->post('tanggal_lahir',TRUE),
		);

		$nim = $this->input->post('nim');
		$this->db->where('nim',$nim);
		$this->db->update($this->table1,$data);
	}

	function saveUser(){
		$data = array(
		'username' 	=> $this->input->post('username',TRUE),
		'password'	=> $this->input->post('password',TRUE),
		'id_level_user'	=> $this->input->post('id_level_user',TRUE),
		
		);
		// print_r($data);
		$this->db->insert($this->table,$data);
	}
}