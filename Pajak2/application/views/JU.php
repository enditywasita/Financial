<!--START-->
<style media="screen">
		.material-icons {
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
  }
</style>
<style media="screen">
		.button1 {
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
  }
</style>
<?php foreach ($idd as $key) {
	$id_user=$key->id;
} ?>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                      <?php foreach ($user as $key): if($key->id==$id_user){ ?>
                        <div class="main-sparkline13-hd">
													<img src="<?php echo base_url('assets/img/Banner3.png'); ?>" class="responsive">
												<center>
												<br>
												<br>  <h2>Jurnal <span class="table-project-n">Umum</span> <?php echo $key->nama_perusahaan; ?> Periode <?php echo $key->periode;?></h2>
												<br>
												<br>
												<br>
											</center></div>
                        <?php } endforeach; ?>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                          <a href="#myModal" class="btn btn-success col-sm-2" data-toggle="modal"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Tambah Data</span></a>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                  <tr>
                                    <th><center>Tanggal</th>
                                    <th><center>Keterangan</th>
                                    <th><center>No Faktur</th>
                                    <th><center>Kode</th>
                                    <th><center>Nama</th>
                                    <th><center>Status</th>
                                    <th><center>Jumlah</th>
                                    <th><center>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($dataa as $key): if($key->id_user==$id_user){  ?>
                                    <?php foreach($neracaa as $key1): if($key1->id_user==$id_user){ if($key->kode_user==$key1->kode_akun){?>
                                      <?php $string="$key1->nama_akun" ?>
                                    <?php }} endforeach; ?>
                                  <tr>
                                    <td><center><?php echo $key->tanggal;?></td>
                                    <td><center><?php echo $key->keterangan;?></td>
                                    <td><center><?php echo $key->no_transaksi;?></td>
                                    <td><center><?php echo $key->kode_user;?></td>
                                    <td><center><?php echo $string;?></td>
                                    <td><center><?php echo $key->pembayaran;?></td>
                                    <td><center><?php echo number_format($key->jumlah,0,"",".");?></td>
                                    <td><center>
																			<a href="#"><i class="material-icons" style="color:orange" data-toggle="tooltip" title="Edit" onclick="edit('<?php echo $key->id;?>')">&#xE254;</i></a>
																			<a href="<?php echo base_url('pajak2/hapus2') ?>?id=<?php echo $key->id ?>&id_user=<?php echo $id_user ?>"><i class="material-icons" style="color:red" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')">&#xE872;</i></a>
																			<!-- <form class="" action="<?php echo base_url('pajak2/hapus2'); ?>" method="post" align="right">
																			 <input type="text" name="id" hidden value="<?php echo $key->id ?>">
																			 <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
																			 <input class="material-icons" style="color:red" data-toggle="tooltip" type="submit" name="submit" value="delete" id="delete" onclick="return confirm('Are you sure?')">
																			</form> -->
                                    </center></td>
                                  </tr>
                                <?php } endforeach; ?>
                              </tbody>
                            </table>
														<br>
														<a href="<?php echo base_url("pajak2/awal") ?>" class="btn btn-success col-sm-1"><span>Back</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<!-- END DATATABLE -->
<!-- MODAL -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Tambah Data</h4>
      </div>
      <?php echo form_open('pajak2/create2'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label>No Faktur</label>
          <input type="text" name="no_transaksi" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" name="keterangan" class="form-control" required>
        </div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
		          <label>Kode User</label>
		          <select name="kode_user" readonly class="form-control">
		          <?php foreach ($neracaa as $key): if($key->id_user==$id_user){ ?>
		                  <option value="<?php echo $key->kode_akun;?>"><?php echo $key->kode_akun;?>&nbsp <?php echo $key->nama_akun;?></option>
		          <?php } endforeach; ?>
		            </select>
		        </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
		          <label>Kode User</label>
		          <select name="kode_user1" readonly class="form-control">
		          <?php foreach ($neracaa as $key): if($key->id_user==$id_user){ ?>
		                  <option value="<?php echo $key->kode_akun;?>"><?php echo $key->kode_akun;?>&nbsp <?php echo $key->nama_akun;?></option>
		          <?php } endforeach; ?>
		            </select>
		        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
		          <label for="">Status</label>
							<input type="hidden" name="pembayaran" value="Debit">
							<input type="text" name="" value="Debit" class="form-control" disabled>
		        </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
		          <label for="">Status</label>
							<input type="hidden" name="pembayaran1" value="Kredit">
							<input type="text" name="" value="Kredit" disabled class="form-control">
		        </div>
					</div>
				</div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" id="jumlah" name="jumlah" class="form-control" onkeyup="myFunction()" onclick="myFunction()">
        </div>
      </div>
        <div class="modal-footer">
          <input type="text" name="id_user" hidden value="<?php echo $id_user; ?>">
          <input type="submit" class="btn btn-default" name="submit" value="simpan">
        </div>
        </form>
      </div>
  </div>
</div>
<script type="text/javascript">
function edit(id){
  $.ajax({
    url:"<?php echo base_url('pajak2/edit2/');?>"+id,
    success:function(data){
      console.log(data);
      var data = JSON.parse(data);
      $('#editData').modal('show');
      $.each(data,function(key,val){
        $('#id').val(val.id);
        $('#no_transaksi').val(val.no_transaksi);
        $('#keterangan').val(val.keterangan);
        $('#pembayaran').val(val.pembayaran);
        $('#jumlah').val(val.jumlah);
      });
    }
  })
}
</script>
<!-- Modal -->
<div id="editData" class="modal fade" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <?php echo form_open('pajak2/update2'); ?>
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Form Edit Jurnal Umum</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label for="">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" class="form-control" requred>
        <input type="hidden" id="id" name="id" class="form-control" required>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
      </div>
      <div class="form-group">
        <label for="">No Faktur</label>
        <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" required>
      </div>
			<div class="form-group">
				<label>Kode User</label>
				<select name="kode_user" readonly class="form-control">
					<?php foreach ($neracaa as $key): if($key->id_user==$id_user){ ?>
							<option value="<?php echo $key->kode_akun;?>"><?php echo $key->kode_akun;?>&nbsp <?php echo $key->nama_akun;?></option>
					<?php } endforeach; ?>
				</select>
			</div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="pembayaran" id="pembayaran" class="form-control">
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
          </select>
      </div>
      <div class="form-group">
        <label for="">Jumlah</label>
        <input type="text" id="jumlah" name="jumlah" class="form-control" onkeyup="myFunction()" onclick="myFunction()">
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" name="submit" class="btn btn-success" value="Update">
    </div>
  </div>
  </form>

</div>
</div>
<!-- END -->
<script>
function myFunction() {
  var x = document.getElementById("jumlah");
  if(x.value=="-"||x.value<0){
  x.value=0;}
  else{
  x.value = x.value;}
}
</script>
