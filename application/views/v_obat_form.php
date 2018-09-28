<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
        <!-- Horizontal Form-->
        <div class="col-lg-8">
            <div class="card-body">
              <?php echo form_open($action,'class="form-horizontal"') ?>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Obat ID</label>
                <div class="col-sm-9">
                  <input id="" name="_id" type="text" placeholder="" value="<?php if(isset($data_obat->id)){ echo $data_obat->id;}else{echo set_id_obat();}?>" class="form-control form-control-warning" readonly>
                </div>
              </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Nama Obat</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" name="_namaobat" type="text" placeholder="Estimate" value="<?php if(isset($data_obat->id)){ echo $data_obat->nama;}?>" class="form-control form-control-warning">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Kandungan Obat</label>
                  <div class="col-sm-9">
                    <textarea rows="5" id="inputHorizontalWarning" name="_kandungan" type="textarea" placeholder="Estimate" value="" class="form-control form-control-warning"><?php if(isset($data_obat->id)){ echo $data_obat->kandungan;}?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Type</label>
                  <div class="col-sm-9">
                    <select name="_tipe" class="form-control mb-3">
                      <option <?php if(isset($data_obat->tipe) && $data_obat->tipe == 'Income'){echo 'selected';}?>>Income</option>
                      <option <?php if(isset($data_obat->tipe) && $data_obat->tipe == 'Outcome'){echo 'selected';}?>>Outcome</option>
                    </select>
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
