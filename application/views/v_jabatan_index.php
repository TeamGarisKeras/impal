<!-- Dashboard Counts Section-->
  <!-- Dashboard Counts Section-->
    <section class="dashboard-counts">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <?php if ($this->session->flashdata('insert_jabatan') == 'sukses') { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <span>Data berhasil disimpan kedalam database!!</span>
             </div>
           <?php } ?>
           <?php if ($this->session->flashdata('delete_jabatan') == 'sukses') { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span>Data berhasil dihapus!!</span>
              </div>
          <?php } ?>
          </div>
        </div>
        <div class="row bg-white has-shadow">
          <div class="col-12 py-3">
            <?= anchor('jabatan/add','<i class="fa fa-plus" aria-hidden="true"></i> Add Jabatan Data', 'class="btn btn-primary"') ?>
          </div>
          <div class="col-12">
            <div class="table-responsive">
              <table id="table_id" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th width="15%">No</th>
                    <th width="15%">ID</th>
                    <th>Nama</th>
                    <th width="15%">Action</th>
                  </tr>
               </thead>
                <tbody>
                  <?php  $no = 1;
                  foreach ($list_jabatan as $row): ?>
                    <tr>
                      <td scope="row"><?=$no++?></td>
                      <td width="15%"><?=$row->id?></td>
                      <td><?=$row->nama_jabatan?></td>
                      <td width="15%"><a href="jabatan/edit/<?=$row->id?>"  id="<?=$row->id?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                  <a href="#" data-id="<?=$row->id?>" class="text-danger delete_jabatan"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
                  <!--MODAL HAPUS, scriptnya menggunakan javascript-->
          <div class="modal fade" id="delete_jabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Delete Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                      <?php echo form_open('jabatan/delete','class="form-horizontal"') ?>
                 <div class="modal-body">
                    <input type="hidden" name="_id" id="id_hapus" value="">
                    <div class="alert alert-warning"><p>Apakah anda yakin akan menghapus Data Jabatan dengan ID <span id="id_jabatan"></span> ?</p></div>
                 </div>
                  <div class="modal-footer">
                      <button class="btn_hapus btn btn-danger" tyoe="submit">Delete</button>
                  </div>
                  <?= form_close(); ?>
              </div>
            </div>
          </div>
