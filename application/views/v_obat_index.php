          <!-- Dashboard Counts Section-->

                    <!-- Dashboard Counts Section-->
                    <section class="dashboard-counts">
                      <div class="container">
                        <div class="row">
                            <div class="col-12">
                              <!-- <?php if ($this->session->flashdata('cek_field') == 'sukses') { ?>
                               <div class="alert alert-success alert-dismissible" role="alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <span>Data berhasil disimpan kedalam database!!</span>
                               </div>
                             <?php } ?>
                             <?php if ($this->session->flashdata('cek_delete') == 'sukses') { ?>
                              <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span>Data berhasil dihapus!!</span>
                              </div>
                            <?php } ?> -->
                            </div>
                          <!-- Statistics -->
                            <div class="statistic col-md-4 col-sm-12 d-flex align-items-center bg-white has-shadow">
                              <div class="icon bg-blue"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                              <div class="text"><strong>Rp. <?=number_format($pemasukan)?></strong><br><small>Monthly Income</small></div>
                            </div>
                            <div class="statistic col-md-4 col-sm-12 d-flex align-items-center bg-white has-shadow">
                              <div class="icon bg-red"><i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                              <div class="text"><strong>Rp. <?=number_format($pengeluaran)?></strong><br><small>Monthly Outcome</small></div>
                            </div>
                            <div class="statistic col-md-4 col-sm-12 d-flex align-items-center bg-white has-shadow">
                              <div class="icon bg-green"><i class="fa fa-money" aria-hidden="true"></i></div>
                              <div class="text"><strong>Rp. <?=number_format($pemasukan_bersih)?></strong><br><small>Monthly Net Income</small></div>
                            </div>
                        </div>
                        <div class="row bg-white has-shadow">
                          <div class="col-12 py-3">
                            <?= anchor('keuangan/add','<i class="fa fa-plus" aria-hidden="true"></i> Add Financial Data', 'class="btn btn-primary"') ?>
                          </div>
                          <div class="col-12">
                            <div class="table-responsive">
                              <table id="table_id" class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Income</th>
                                    <th>Outcome</th>
                                    <th>Net Income</th>
                                    <th width="15%">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php  $no = 1;
                                  foreach ($grid as $row): ?>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>KE123123</td>
                                    <td>18-sept-2018</td>
                                    <td>500.000</td>
                                    <td>200.000</td>
                                    <td>300.000</td>
                                    <td width="15%"><a href="#" class="detail-keuangan" id="<?=$row->id?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                      <a href="#" data-id="<?=$row->id?>" class="text-danger delete_keuangan"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>

                                  </tr>
                                <?php endforeach; ?>
                                </tbody>
                              </table>
                            </div>

                        </div>
                      </div>
                    </section>

                    <!-- view Modal -->
                    <div class="modal fade" id="keuanganModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content ">
                          <div class="modal-header">
                            <h4 class="modal-title" id="modal-judul">Keuangan Detail</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div id="keuangan_result"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--MODAL HAPUS-->
                    <div class="modal fade" id="delete_keuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Delete Keuangan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                </div>
                                <?php echo form_open('keuangan/delete','class="form-horizontal"') ?>
                                <div class="modal-body">

                                        <input type="hidden" name="_id" id="id_hapus" value="">
                                        <div class="alert alert-warning"><p>Apakah anda yakin akan menghapus Data Keuangan dengan ID <span id="keuangan_id"></span> ?</p></div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn_hapus btn btn-danger" tyoe="submit">Delete</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
