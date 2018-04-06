<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> STATUS PRESTASI
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('users/add','role="form" class="form-horizontal"');?>
                <div class="form-group">
                <input type="hidden" id="nim" value="<?php echo $this->uri->segment(3);?>">
                    <label class="col-sm-2 control-label" for="form-field-1">
                        STATUS PRESTASI
                    </label>
                    <div class="col-sm-9">
                        <select name="status" id="status" class='form-control' onchange="loadStatus()">
                            <option value="0">Belum Terverifikasi</option>
                            <option value="1">Terverifikasi</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-external-link-square"></i> DAFTAR PRESTASI
            <div class="panel-tools">
                <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                </a>

                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="panel-body">
        <div id="table2">
<!--           <div class="table-responsive">
            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Perlombaan</th>
                  <th>Jenis Prestasi</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </tfoot>              
              <div id="table">

              </div>
            </table>
          </div>     -->     
        </div>   
        </div>
    </div>
</div>




<script type='text/javascript'>
$(document).ready(function(){ 
    loadStatus();
})
</script>

<script type='text/javascript'>
function loadStatus(){
    var status = $("#status").val();
    var username = $("#nim").val();
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url();?>index.php/mahasiswa/dataVerifikasi',
        data:  'status='+status+'&nim='+username,
        success: function(html){
            $("#table2").html(html);
        }
    })
}



</script>

