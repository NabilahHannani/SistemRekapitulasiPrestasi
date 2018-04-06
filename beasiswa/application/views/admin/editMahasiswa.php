<div class="col-sm-12">
                        <!-- start: TEXT FIELDS PANEL -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-external-link-square"></i> Text Fields
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                                    </a>
                                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-expand" href="#">
                                        <i class="fa fa-resize-full"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-close" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                            <?php echo form_open('admin/editMahasiswa','role="form" class="form-horizontal"');?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            NIM
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nim" readonly id="form-field-1" value="<?php echo $mahasiswa['nim'];?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Nama Mahasiswa
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_mahasiswa" value="<?php echo $mahasiswa['nama_mahasiswa'];?>" placeholder="Masukan Nama" id="form-field-1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Program Studi
                                        </label>
                                        <div class="col-sm-9">
                                            <select name="jurusan" class='form-control'>
                                            <?php
                                            if($mahasiswa['jurusan'] == 'Teknologi Informasi'){
                                                echo '<option value="Teknologi Informasi" selected>Teknologi Informasi</option>';
                                                echo '<option value="Ilmu Komputer">Ilmu Komputer</option>';
                                            }else{
                                                echo '<option value="Ilmu Komputer" selected>Ilmu Komputer</option>';
                                                echo '<option value="Teknologi Informasi" >Teknologi Informasi</option>';
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Jenis Kelamin
                                        </label>
                                        <div class="col-sm-9">
                                            <select name="JK" class='form-control'>
                                            <?php
                                            if($dosen['JK'] == 'L'){
                                                echo '<option value="L" selected>Laki-Laki</option>';
                                                echo '<option value="P">Perempuan</option>';
                                            }else{
                                                echo '<option value="P" selected>Perempuan</option>';
                                                echo '<option value="L" >Laki-Laki</option>';
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Tempat Lahir
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir'];?>" placeholder="Masukan Tempat Kelahiran" id="form-field-1" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Tanggal Lahir
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir'];?>" placeholder="Masukan Tanggal Lahir" id="form-field-1" class="form-control">
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1">
                                            Alamat
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat'];?>" placeholder="Masukan Alamat" id="form-field-1" class="form-control">
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="form-field-1"></label>
                                        <div class="col-sm-1">
                                            <button type="submit" name="submit" class="btn btn-danger">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end: TEXT FIELDS PANEL -->
                    </div>