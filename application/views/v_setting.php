<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <?php if ($this->session->flashdata('status_change_profil') == 'sukses') { ?>
     <div class="alert alert-success alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <span>Data Profil Berhasil diganti!!</span>
     </div>
   <?php } ?>
   <?php if ($this->session->flashdata('status_change_password') == 'sukses') { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <span>Password Anda Berhasil diganti!!</span>
    </div>
  <?php }?>
    <div class="row bg-white has-shadow">
        <!-- Horizontal Form-->
        <div class="col-lg-8 col-sm-12 col-12">
            <div class="col-12">
              <?php echo form_open('setting/changeprofil','class="form-horizontal"'); ?>
                  <div class="col-sm-12 text-center">
                      <img class="img-fluid " src="<?php if(isset($data_akun->image) == ''){echo base_url().'assets/img/foto-profil/foto_default.jpg';}else{echo $data_akun->image;}?>" id="profile-img-tag" />
                      <div class="col-12 col-sm-9 offset-sm-3 py-2">
                        <input id="profile-img" type="file" name="_image" class="form-control-file">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">ID Karyawan</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" type="text" placeholder="Username" name="_id" value="<?=$data_akun->id?>" class="form-control form-control-success" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" name="_nama"  type="text" placeholder="Name" name="_nama" value="<?=$data_akun->nama?>" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">No Telp</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" name="_no_telp" type="text" placeholder="Name" name="_nama" value="<?=$data_akun->no_telp?>" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Alamat</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" name="_alamat" type="text" placeholder="Name" name="_nama" value="<?=$data_akun->alamat?>" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Kelurahan</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" nama="_kelurahan" type="text" placeholder="Name" name="_nama" value="<?=$data_akun->kelurahan?>" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Kecamatan</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" name="_kecamatan" type="text" placeholder="Name" name="_nama" value="<?=$data_akun->kecamatan?>" class="form-control form-control-warning">
                    </div>
                  </div>
                   <div class="form-group row">
                     <div class="col-sm-9 offset-sm-3">
                      <input type="submit" value="Save" class="btn btn-success" card="btn btn-primary">
                     </div>
                   </div>
                   <?=form_close();?>
               </div>
               <hr>
               <div class="col-12">
                  <?= form_open('admin/changepassword','form-horizontal'); ?>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Old Password</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" type="password" placeholder="Password Lama" name="_old_password" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">New Password</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" type="password" placeholder="Password Baru" name="_new_password" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Password Confirm</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" type="password" placeholder="Name" name="_confirmpassword" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                     <input type="submit" value="Save" class="btn btn-success" card="btn btn-primary">
                    </div>
                  </div>
                  <?=form_close();?>
             </div>
        </div>
      </div>
  </div>
</section>
