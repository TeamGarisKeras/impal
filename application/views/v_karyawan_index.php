  <!-- Dashboard Counts Section-->
    <!-- Dashboard Counts Section-->
      <section class="dashboard-counts">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <?php if ($this->session->flashdata('insert_karyawan') == 'sukses') { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <span>Data berhasil disimpan kedalam database!!</span>
               </div>
             <?php } ?>
             <?php if ($this->session->flashdata('delete_karyawan') == 'sukses') { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span>Data berhasil dihapus!!</span>
                </div>
            <?php } ?>
            </div>
          </div>
          <div class="row bg-white has-shadow">
            <div class="col-12 py-3">
              <?= anchor('karyawan/add','<i class="fa fa-plus" aria-hidden="true"></i> Add Karyawan Data', 'class="btn btn-primary"') ?>
            </div>
            <div class="col-12">
              <div class="table-responsive">
                <table id="table_id" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Kelurahan</th>
                      <th>Kecamatan</th>
                      <th width="15%">Action</th>
                    </tr>
                 </thead>
                  <tbody>
                    <?php  $no = 1;
                    foreach ($data_karyawan as $row): ?>
                      <tr>
                        <td scope="row"><?=$no++?></td>
                        <td><?=$row->id?></td>
                        <td><?=$row->nama?></td>
                        <td><?=$row->no_telp?></td>
                        <td><?=$row->alamat?></td>
                        <td><?=$row->kelurahan?></td>
                        <td><?=$row->kecamatan?></td>
                        <td width="15%"><a href="<?=base_url('')?>karyawan/edit/<?=$row->id?>" class="" id="<?=$row->id?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                    <a href="#" data-id="<?=$row->id?>" data-nama="<?=$row->nama?>" data-jabatan="<?=$row->jabatan?>" class="text-danger delete_karyawan"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
                    <!--MODAL HAPUS-->
            <div class="modal fade" id="delete_karyawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Karyawan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                  </div>
                    <?php echo form_open('karyawan/delete','class="form-horizontal"') ?>
                   <div class="modal-body">
                      <input type="hidden" name="_id" id="id_hapus" value="">
                      <input type="hidden" name="_jabatan" id="id_jabatan" value="">
                      <div class="alert alert-warning"><p>Apakah anda yakin akan menghapus Data Karyawan dengan ID <span id="id_karyawan"></span> dengan nama <span id="nama_karyawan"></span> ?</p></div>
                   </div>
                    <div class="modal-footer">
                        <button class="btn_hapus btn btn-danger" tyoe="submit">Delete</button>
                    </div>
                    <?= form_close(); ?>
                </div>
              </div>
            </div>
