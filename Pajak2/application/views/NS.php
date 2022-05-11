<!--START-->
<?php foreach ($idd as $key) {
	$id_user=$key->id;
} ?>
<style media="screen">
		.material-icons {
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
  }
</style>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                      <?php foreach ($user as $key): if($key->id == $id_user){ ?>
                        <div class="main-sparkline13-hd">
													<img src="<?php echo base_url('assets/img/Banner4.png'); ?>" class="responsive">

												<center>
													 <br>
											<br>
											<h2>Neraca <span class="table-project-n">Saldo</span>
													<?php echo $key->nama_perusahaan; ?> Periode <?php echo $key->periode;?></h2></center>
													 <br>
											<br>
                        </div>
                      <?php } endforeach; ?>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <a href="#myModal" class="btn btn-success col-sm-2" data-toggle="modal"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Tambah Data</span></a>
                            <a href="#myInfo" class="btn btn-info col-sm-1" data-toggle="modal"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;<span>Info</span></a>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                  <tr>
                                    <th><center>Kode Akun</th>
                                    <th><center>Nama Akun</th>
                                    <th><center>Saldo Awal</th>
                                    <th><center>Debet</th>
                                    <th><center>Kredit</th>
                                    <th><center>Saldo Akhir</th>
                                    <th><center>aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($neracaa as $key): if($key->id_user==$id_user){ ?>
                                    <?php $jumlah1 = 0; ?>
                                    <?php $jumlah2 = 0; ?>
                                    <?php foreach ($dataa as $key1): if($key1->id_user==$id_user){
                                      if($key->kode_akun==$key1->kode_user){
                                        if($key1->pembayaran=="Debit"){
                                          $jumlah1=$jumlah1+$key1->jumlah;
                                        }
                                      }
                                      else{
                                        $jumlah1;
                                       }
                                          if($key->kode_akun==$key1->kode_user){if($key1->pembayaran=="Kredit"){
                                            $jumlah2=$jumlah2+$key1->jumlah;
                                         }}else{$jumlah2;}?>
                                       <?php } endforeach; ?>
                                       <tr>
                                         <td><center><?php echo $key->kode_akun;?></td>
                                         <td><center><?php echo $key->nama_akun;?></td>
                                         <td><center><?php echo number_format($key->saldo_awal,0,"","."); ?></td>
                                         <td><center><?php echo number_format($jumlah1,0,"",".");?></td>
                                         <td><center><?php echo number_format($jumlah2,0,"",".");?></td>
																		     <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4151&&$key->kode_akun<=4199||$key->kode_akun>=5100&&$key->kode_akun<=5150||$key->kode_akun>=5200){ ?>
                                           <td><center><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?></td>
                                         <?php }else{ ?>
                                           <td><center><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?></td>
                                         <?php } ?>
                                         <td><center>
																					 <a href="#"><i class="material-icons" style="color:orange" data-toggle="tooltip" title="Edit" onclick="edit('<?php echo $key->id;?>')">&#xE254;</i></a>
																					 <a href="<?php echo base_url('pajak2/hapus1') ?>?id=<?php echo $key->id ?>&kode_akun=<?php echo $key->kode_akun ?>&id_user=<?php echo $id_user ?>"><i class="material-icons" style="color:red" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')">&#xE872;</i></a>
                                             <!-- <form class="" action="<?php echo base_url('pajak2/hapus1'); ?>" method="post" align="right">
                                             	<input type="text" name="id" hidden value="<?php echo $key->id ?>">
                                              <input type="text" name="kode_akun" hidden value="<?php echo $key->kode_akun ?>">
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
	<!-- Modal -->
<div id="myInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Info Kode Akun</h4>
      </div>
      <div class="modal-body">
        <p>Kode Akun dari 1000-1699 adalah ASSET LANCAR (Persediaan Kode Akun = 1300-1399) & (PPh Kode Akun = 1400-1499)</p>
        <p>Kode Akun dari 1700-1899 adalah ASSET TETAP (+)</p>
        <p>Kode Akun dari 1900-1999 adalah AKUMULASI ASSET TETAP (-)</p>
        <p>Kode Akun dari 2000-2699 adalah LIABILITAS LANCAR (-)</p>
        <p>Kode Akun dari 2700-2999 adalah LIABILITAS JANGKA PANJANG (-)</p>
        <p>Kode Akun dari 3000-3199 adalah MODAL (-)</p>
        <p>Kode Akun dari 3200-3399 adalah Prive (+)</p>
        <p>Kode Akun dari 4151-4199 adalah RETUR PENJUALAN (+)</p>
        <p>Kode Akun dari 4100-4150 adalah PENJUALAN (-)</p>
        <p>Kode Akun dari 4200-4299 adalah PENDAPATAN LUAR USAHA (-)</p>
        <p>Kode Akun dari 5151-5199 adalah RETUR PEMBELIAN (-)</p>
        <p>Kode Akun dari 5100-5150 adalah PEMBELIAN (+)</p>
        <p>Kode Akun dari 5200-5299 adalah BEBAN OPERASIONAL (+)</p>
        <p>Kode Akun dari 5300-5399 adalah BIAYA LUAR USAHA (+)</p>
        <p>Kode Akun dari 6000 adalah IKHTISAR LABA RUGI</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
				<?php echo form_open('pajak2/create'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Akun</label>
            <input type="text" name="kode_akun" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Nama Akun</label>
            <input type="text" name="nama_akun" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Saldo Awal</label>
            <input type="number" name="saldo_awal" class="form-control" required id="saldo_awal" onkeyup="myFunction()" onclick="myFunction()">
          </div>
          <div class="form-group">
            <label for="">Tipe</label>
            <select name="tipe" class="form-control">
                    <option value="Neraca">Neraca</option>
                    <option value="Laba Rugi">Laba Rugi</option>
                    <option value="Neraca & Laba Rugi">Neraca & Laba Rugi</option>
              </select>
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
      url:"<?php echo base_url('pajak2/edit1/');?>"+id,
      success:function(data){
        console.log(data);
        var data = JSON.parse(data);
        $('#editData').modal('show');
        $.each(data,function(key,val){
          $('#id').val(val.id);
          $('#kode_akun').val(val.kode_akun);
          $('#kode_akun2').val(val.kode_akun);
          $('#nama_akun').val(val.nama_akun);
          $('#saldo_awal').val(val.saldo_awal);
          $('#tipe').val(val.tipe);
        });
      }
    })
  }
</script>
<!-- Modal -->
<div id="editData" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
		<?php echo form_open('pajak2/update1'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Edit Neraca Saldo</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Kode Akun</label>
          <input type="text" id="kode_akun" name="kode_akun" class="form-control" required>
          <input type="hidden" id="kode_akun2" name="kode_akun2" class="form-control" required>
          <input type="hidden" id="id" name="id" class="form-control">
					<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
        </div>
        <div class="form-group">
          <label for="">Nama Akun</label>
          <input type="text" id="nama_akun" name="nama_akun" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Saldo Awal</label>
          <input type="text" id="saldo_awal" name="saldo_awal" class="form-control" required onkeyup="myFunction()" onclick="myFunction()">
        </div>
				<div class="form-group">
					<label for="">Tipe</label>
					<select id="tipe" name="tipe" class="form-control">
									<option value="Neraca">Neraca</option>
									<option value="Laba Rugi">Laba Rugi</option>
									<option value="Neraca & Laba Rugi">Neraca & Laba Rugi</option>
						</select>
				</div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit" class="btn btn-success" value="Update">
      </div>
    </div>
		</form>

  </div>
</div>
	<!--END-->
	<script>
function myFunction() {
  var x = document.getElementById("saldo_awal");
  if(x.value=="-"||x.value<0){
  x.value=0;}
  else{
  x.value = x.value;}
}
</script>
