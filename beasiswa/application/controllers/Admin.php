	<?php

class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Admin');
		$this->load->model('M_Mahasiswa');
	}

	function index(){
		$data['mhs'] = $this->M_Mahasiswa->showMahasiswa();
		$this->template->load('template','mahasiswa/list',$data);

	}

	function dataVerifikasi()
	{
		$status		= $_GET['status'];
		// $prestasi 			= $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
		// echo $prestasi['jenis_prestasi'];
		echo $this->formVerifikasi($status);
	}
	
	function editMahasiswa(){
		if(isset($_POST['submit'])){
			$this->M_Admin->update();
			redirect('mahasiswa');
		}else{
			$id = $this->uri->segment(3);
			$data['mahasiswa'] = $this->db->get_where('tbl_mahasiswa',array('nim'=>$id))->row_array();
			$this->template->load('template','admin/editMahasiswa',$data);
		}
	}

	function deleteMahasiswa(){
		$nim = $this->uri->segment(3);
		if(!empty($nim)){
			$this->db->where('nim',$nim);
			$this->db->delete('tbl_mahasiswa');
		}
		redirect('mahasiswa');

	}

	function addUser(){
		if(isset($_POST['submit'])){
			$this->M_Admin->saveUser();
			redirect('dosen/addDosen');
		}else{
			$this->template->load('template','dosen/add');
		}
	}
	function addDosen(){
		if(isset($_POST['submit'])){
			$this->M_Dosen->saveUser();
			redirect('dosen');
		}else{
			$this->template->load('template','dosen/add');
		}
	}

	function formVerifikasi($status){

        echo '<div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
	                <th>No</th>
		            <th>Nama Mahasiswa</th>
		            <th>NIM</th>
		            <th>Prodi</th>
		            <th>Nama Perlombaan</th>
	                <th>Jenis Prestasi</th>
	                <th>Tanggal</th>
	                <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
					<th>No</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>Prodi</th>
					<th>Nama Perlombaan</th>
					<th>Jenis Prestasi</th>
					<th>Tanggal</th>
					<th>Aksi</th>
                </tr>
              </tfoot>              
				<tbody>';
		if($status == 0){
		$records 	= $this->db->get_where('tbl_history_lomba',array('status'=>'Belum Terverifikasi'))->result();
		$no = 1;
      	foreach ($records as $r) {
        $id_prestasi 	= $r->id_prestasi;
        $id_lomba 		= $r->id_lomba;
        $mhs  			= $this->db->get_where('tbl_mahasiswa',array('nim'=>$r->nim))->row_array();
        if($r->id_prestasi == 1 || $r->id_prestasi == 2)
        {
	        $query = $this->db->get_where('tbl_lomba',array('id_lomba'=>$id_lomba))->row_array();
	        $lomba = $query['nama_kompetisi'];
	    }
	    else if($r->id_prestasi == 3 || $r->id_prestasi == 4)
	    {
	    	$query = $this->db->get_where('tbl_penelitian',array('id_penelitian'=>$id_lomba))->row_array();
	        $lomba = $query['judul_penelitian'];
	    }
	    else
	    {
	    	$query = $this->db->get_where('tbl_organisasi',array('id_kepanitiaan'=>$id_lomba))->row_array();
	        $lomba = $query['nama_organisasi'];
		}

	    $query = $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
	    $prestasi = $query['jenis_prestasi'];
	        
      	echo"
        <tr>
          <td>$no</td>
          <td>".$mhs['nama_mahasiswa']."</td>
          <td>".$mhs['nim']."</td>
          <td>".$mhs['jurusan']."</td>
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
          <td>".anchor('prestasi/lihat/'.$r->id_history,'<i class="fa fa-eye"></i>','class="btn btn-sm btn-teal tooltips" data-placement="top" data-original-title="Lihat"').
			  /* .anchor('prestasi/edit/'.$r->id_history,'<i class="fa fa-edit"></i>','class="btn btn-sm btn-warning tooltips" data-placement="top" data-original-title="edit"').' '
			   .anchor('admin/delete/'.$r->id_history,'<i class="fa fa-times fa fa-red"></i>','class="btn btn-sm btn-bricky tooltips" data-placement="top" data-original-title="Delete"')."*/"</td>
		</tr>";
		$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }else{
		$username   = $this->session->userdata('username');
		$records 	= $this->db->get_where('tbl_history_lomba',array('status'=>'Sudah Terverifikasi'))->result();
		$no = 1;
      	foreach ($records as $r) {
        $id_prestasi = $r->id_prestasi;
        $id_lomba 		= $r->id_lomba;
        $mhs  			= $this->db->get_where('tbl_mahasiswa',array('nim'=>$r->nim))->row_array();
        if($r->id_prestasi == 1 || $r->id_prestasi == 2)
        {
	        $query = $this->db->get_where('tbl_lomba',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['nama_kompetisi'];
	    }
	    else if($r->id_prestasi == 3 || $r->id_prestasi == 4)
	    {
	    	$query = $this->db->get_where('tbl_penelitian',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['judul_penelitian'];
	    }
	    else
	    {
	    	$query = $this->db->get_where('tbl_organisasi',array('id_prestasi'=>$id_prestasi))->row_array();
	        $lomba = $query['nama_organisasi'];
		}

	    $query = $this->db->get_where('jenis_kompetisi',array('id_prestasi'=>$id_prestasi))->row_array();
	    $prestasi = $query['jenis_prestasi'];
	        
      	echo"
        <tr>
          <td>$no</td>
          <td>".$mhs['nama_mahasiswa']."</td>
          <td>".$mhs['nim']."</td>
          <td>".$mhs['jurusan']."</td>
          <td>$lomba</td>
          <td>$prestasi</td>
          <td>".$r->tanggal."</td>
          <td>".anchor('prestasi/lihat/'.$r->id_history,'<i class="fa fa-eye"></i>','class="btn btn-sm btn-teal tooltips" data-placement="top" data-original-title="Lihat"').
			  /* .anchor('prestasi/edit/'.$r->id_history,'<i class="fa fa-edit"></i>','class="btn btn-sm btn-warning tooltips" data-placement="top" data-original-title="edit"').' '
			   .anchor('admin/delete/'.$r->id_history,'<i class="fa fa-times fa fa-red"></i>','class="btn btn-sm btn-bricky tooltips" data-placement="top" data-original-title="Delete"')."*/"</td>
		</tr>";$no++;
       	}
       	echo "</tbody>
       		</table>
       		</div>";
       }

	}

}