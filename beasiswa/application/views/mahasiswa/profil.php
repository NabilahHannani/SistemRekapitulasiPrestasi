<div class="col-sm-12">
    <?=$this->session->flashdata('pesan')?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DATA MAHASISWA
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered">
              <tr>
                <td>NIM</td>
                <td><?php echo $mahasiswa['nim'];?></td>
              </td>

              <tr>
                <td>Nama Mahasiswa</td>
                <td><?php echo $mahasiswa['nama_mahasiswa'];?></td>
              </tr>

              <tr>
                <td>Jurusan</td>
                <td><?php echo $mahasiswa['jurusan'];?></td>
              </tr>

              <tr>
                <td>Jenis Kelamin</td>
                <td>
                <?php 
                if($mahasiswa['JK'] == 'L')
                  echo 'Laki-laki';
                else
                  echo 'Perempuan';
                  ?></td>
              </tr>

              <tr>
                <td>Tempat Lahir</td>
                <td><?php echo $mahasiswa['tempat_lahir'];?></td>
              </tr>

              <tr>
                <td>Tanggal Lahir</td>
                <td><?php echo $mahasiswa['tanggal_lahir'];?></td>
              </tr>

              <tr>
                <td>Alamat</td>
                <td><?php echo $mahasiswa['alamat'];?></td>
              </tr>
            </table>
          </div>         
        </div>
    </div>
</div>