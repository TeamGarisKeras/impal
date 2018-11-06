<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
        <!-- Horizontal Form-->
        <div class="col-lg-8">
            <div class="card-body">
              <?php echo form_open($action,'class="form-horizontal"') ?>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Jabatan ID</label>
                <div class="col-sm-9">
                  <input id="" name="_id" type="text" placeholder="" value="<?php if(isset($data_jabatan->id)){ echo $data_jabatan->id;}?>" class="form-control form-control-warning" readonly>
                </div>
              </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nama Jabatan</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" name="_namajabatan" type="text" placeholder="Estimate" value="<?php if(isset($data_jabatan->nama_jabatan)){ echo $data_jabatan->nama_jabatan;}?>" class="form-control form-control-warning">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-9 offset-sm-3">
                    <input type="submit" value="Submit" class="btn btn-primary">
                  </div>
                </div>
                <?php echo form_close(); ?>
        </div>
      </div>
  </div>
</div>
</section>
