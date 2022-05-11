<?php $id=$this->session->userdata('id'); ?>
<!--START-->
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <img src="<?php echo base_url('assets/img/Banner2.png'); ?>" class="responsive">
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
													<br>
													<br>
                          <a href="#myModal" class="btn btn-success col-sm-2" data-toggle="modal"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Tambah Data</span></a>
                          <a href="<?php echo base_url('pajak2/logout') ?>" class="btn btn-sign-out col-sm-1"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;<span>Logout</span></a>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                  <tr>
                                    <th><center>Nama Perusahaan</center></th>
                                    <th><center>Nama Pimpinan</center></th>
                                    <th><center>Periode</center></th>
                                    <th><center>Aksi</center></th>
                                    <th><center>Data</center></th>
                                    <th><center>Laporan</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($user as $key):if($key->id_akun==$id): ?>
                                    <tr>
                                      <td><center><?php echo $key->nama_perusahaan; ?></td>
                                      <td><center><?php echo $key->nama_pimpinan; ?></td>
                                      <td><center><?php echo $key->periode; ?></td>
                                      <td>
	                                      <center>
																					<a href="#"><i class="material-icons" style="color:orange" data-toggle="tooltip" title="Edit" onclick="edit('<?php echo $key->id;?>')">&#xE254;</i></a>
																					<a href="<?php echo base_url("pajak2/hapus/$key->id"); ?>"><i class="material-icons" style="color:red" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')">&#xE872;</i></a>
				                                    <!-- <?php echo anchor('pajak2/hapus/'.$key->id,'Hapus');?> -->
                                      </td>
                                      <td><center>
                                        <a href="<?php echo base_url('pajak2/NS/'.$key->id); ?>">Neraca Saldo</a><br>
                                        <a href="<?php echo base_url('pajak2/JU/'.$key->id); ?>">Jurnal Umum</a>
                                      </center></td>
                                      <td><center>
                                        <a href="<?php echo base_url('pajak2/lneraca/'.$key->id); ?>">Laporan Neraca</a><br>
                                        <a href="<?php echo base_url('pajak2/lLB/'.$key->id); ?>">Laporan Laba Rugi</a><br>
                                        <a href="<?php echo base_url('pajak2/lPM/'.$key->id); ?>">Laporan Perubahan Modal</a>
                                      </center>
                                        <!-- <form action="<?php echo base_url("Pajak2/lneraca") ?>" method="post">
                                          <input type="submit" name="submit" value="Laporan Neraca" class="btn btn-outline-info">
                                          <input type="text" name="id_user" hidden value="<?php echo $key->id; ?>">
                                          <input type="text" name="nama_perusahaan" hidden value="<?php echo $key->nama_perusahaan; ?>">
                                          <input type="text" name="nama_pimpinan" hidden value="<?php echo $key->nama_pimpinan; ?>">
                                        </form>
                                        <form action="<?php echo base_url("Pajak2/lLB") ?>" method="post" align="right">
                                          <input type="submit" name="submit" value="Laporan Laba Rugi" class="btn btn-outline-info">
                                          <input type="text" name="id_user" hidden value="<?php echo $key->id; ?>">
                                          <input type="text" name="nama_perusahaan" hidden value="<?php echo $key->nama_perusahaan; ?>">
                                          <input type="text" name="nama_pimpinan" hidden value="<?php echo $key->nama_pimpinan; ?>">
                                          <input type="text" name="periode" hidden value="<?php echo $key->periode; ?>">
                                        </form> -->
                                      </td>
                                    </tr>
                                  <?php endif; endforeach; ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MODAL -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form Tambah Data</h4>
                      </div>
                      <?php echo form_open('pajak2/create1'); ?>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Nama Pimpinan</label>
                          <input type="text" name="nama_pimpinan" class="form-control" required>
                          <input type="text" hidden name="id" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                          <label>Nama Perusahaan</label>
                          <input type="text" name="nama_perusahaan" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Periode</label>
                          <input type="month" name="periode" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-default" name="submit" value="simpan">
                        </div>
                        </form>
                      </div>
                  </div>
                </div>
								</div>
								<script type="text/javascript">
								function edit(id){
									$.ajax({
										url:"<?php echo base_url('pajak2/edit3/');?>"+id,
										success:function(data){
											console.log(data);
											var data = JSON.parse(data);
											$('#editData').modal('show');
											$.each(data,function(key,val){
												$('#id').val(val.id);
												$('#nama_pimpinan').val(val.nama_pimpinan);
												$('#nama_perusahaan').val(val.nama_perusahaan);
												$('#periode').val(val.periode);
											});
										}
									})
								}
							</script>
							<!-- Modal -->
							<div id="editData" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<form class="" action="<?php echo base_url("pajak2/update") ?>" method="post">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Form Edit</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label for="">Nama Pimpinan</label>
												<input type="text" id="nama_pimpinan" name="nama_pimpinan" class="form-control" required>
												<input type="hidden" id="id" name="id" class="form-control">
											</div>
											<div class="form-group">
												<label for="">Nama Perusahaan</label>
												<input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="">Periode</label>
												<input type="month" id="periode" name="periode" class="form-control" required>
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-success" name="submit" value="Update">
										</div>
									</div>
									</form>

								</div>
							</div>
<!-- END -->
