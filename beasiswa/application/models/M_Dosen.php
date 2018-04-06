<?php

class M_Dosen extends CI_Model{

	public $table = "tbl_dosen";
	public $table1 = "tbl_history_lomba";

function save(){
		$data = array(
		'nip' 			=> $this->input->post('nip',TRUE),
		'nama_dosen'	=> $this->input->post('nama',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'no_hp' 		=> $this->input->post('handphone',TRUE),
		);
		// print_r($data);
		$this->db->insert($this->table,$data);
	}

	function addUser(){
		$data = array(
		'nip' 			=> $this->input->post('nip',TRUE),
		'nama_dosen'	=> $this->input->post('nama',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'no_hp' 		=> $this->input->post('handphone',TRUE),
		);
		// print_r($data);
		$this->db->insert($this->table,$data);
	}

	function update(){
		$data = array(
		'nip' 			=> $this->input->post('nip',TRUE),
		'nama_dosen'	=> $this->input->post('nama',TRUE),
		'jk' 			=> $this->input->post('jk',TRUE),
		'alamat' 		=> 	$this->input->post('alamat',TRUE),
		'no_hp' 		=> $this->input->post('handphone',TRUE),
		);

		$nip = $this->input->post('nip');
		$this->db->where('nip',$nip);
		$this->db->update($this->table,$data);
	
	}

	function saveStatus(){
		$data = array(
		'id_history'    => $this->input->post('id_history',TRUE),
		'status' 		=> $this->input->post('status',TRUE),
		);

		$id_history = $this->input->post('id_history');
		$this->db->where('id_history',$id_history);
		$this->db->update($this->table1,$data);
	}
}