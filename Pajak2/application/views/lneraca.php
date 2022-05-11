<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title><?php echo $title;?></title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <!-- Google Fonts
   ============================================ -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Bootstrap CSS
   ============================================ -->
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/css/bootstrap.min.css'); ?>">
   <!-- Bootstrap CSS
   ============================================ -->
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/css/font-awesome.min.css'); ?>">
   <!-- normalize CSS
   ============================================ -->
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/css/data-table/bootstrap-table.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/css/data-table/bootstrap-editable.css'); ?>">
   <!-- style CSS
   ============================================ -->
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/style.css'); ?>">
   <!-- responsive CSS
   ============================================ -->
   <link rel="stylesheet" href="<?php echo base_url('assets/Datatable/css/responsive.css'); ?>">
   <!-- modernizr JS
   ============================================ -->
   <script src="<?php echo base_url('assets/Datatable/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
   <!-- jquery
   ============================================ -->
   <script src="<?php echo base_url('assets/Datatable/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
   <!-- bootstrap JS
   ============================================ -->
   <script src="<?php echo base_url('assets/Datatable/js/bootstrap.min.js'); ?>"></script>
   <!-- data table JS
   ============================================ -->
   <script src="<?php echo base_url('assets/Datatable/js/data-table/bootstrap-table.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/tableExport.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/data-table-active.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/bootstrap-table-editable.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/bootstrap-editable.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/bootstrap-table-resizable.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/colResizable-1.5.source.js'); ?>"></script>
   <script src="<?php echo base_url('assets/Datatable/js/data-table/bootstrap-table-export.js'); ?>"></script>
   <!-- main JS
   ============================================ -->
   <script src="<?php echo base_url('assets/Datatable/js/main.js'); ?>"></script>
<style type="text/css">
   .modal .btn {
      border-radius: 2px;
      min-width: 100px;
   }

    body {
        color: #000000;
    background: #ffffff;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
  }

.responsive {
  width: 100%;
  height: auto;
}
  .paragraph{
    position: relative;
    padding-left: 1000px;
    background:#F6F8FA;
  }
  .paragraph .peru{
    padding-left: 30px;
  }
  .paragraph .dir{
    padding-left: 60px;
  }
  .paragraph .pem{
    padding-left: 30px;
    padding-top: 50px;
  }
  </style>
  </head>
<body>
  <?php foreach ($idd as $key) {
    $id_user=$key->id;
  } ?>
<br>
<!---START-->
<center><h3>LAPORAN NERACA</h3>
<?php foreach($user as $u): if($u->id==$id_user){ echo"<h3>Periode";echo $u->periode; echo"</h3>";} endforeach;?>
</center>
<center>
<table width=90%>
  <tr>
    <td width=45%>
      <table width=100%>
        <tr>
          <td align="center">KODE</td>
          <td align="center">ASSET</td>
          <td align="center" colspan="2">JUMLAH</td>
        </tr>
        <tr>
          <td colspan="4"></td>
        </tr>
        <tr>
          <td></td>
          <td>ASSET LANCAR</td>
          <td></td>
          <td></td>
        </tr>
          <?php $jumlah1 = 0; ?>
          <?php $jumlah2 = 0; ?>
          <?php $jumlaha = 0; ?>
        <?php foreach ($neracaa as $key): if($key->id_user==$id_user){if($key->tipe=="Neraca"||$key->tipe="Neraca & Laba Rugi"){ ?>
          <?php $jumlah1 = 0;
          $jumlah2 = 0; ?>
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
          <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699){ ?>
        <tr>
          <td align="center"><?php echo $key->kode_akun;?></td>
          <td><?php echo $key->nama_akun;?></td>
          <td align="center">Rp</td>
          <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4200&&$key->kode_akun<=4999||$key->kode_akun>=5200){ ?>
            <td align="right"><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?><?php $jumlaha=$jumlaha+$key->saldo_awal+$jumlah1-$jumlah2;?></td>
          <?php }else{ ?>
            <td align="right"><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?> <?php $jumlaha=$jumlaha+$key->saldo_awal+$jumlah1-$jumlah2;?></td>
          <?php } ?>
        </tr>
      <?php }}} endforeach; ?>
      <tr>
        <td align="center" colspan="2">JUMLAH ASSET LANCAR</td>
        <td align="center">Rp</td>
        <td align="right"><?php echo number_format($jumlaha,0,"","."); ?></td>
      </tr>
      <tr>
        <td colspan="4"><br></td>
      </tr>
      <tr>
        <td colspan="4"></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>ASSET TETAP</td>
        <td></td>
        <td></td>
      </tr>
        <?php $jumlah1 = 0; ?>
        <?php $jumlah2 = 0; ?>
        <?php $jumlahb = 0; ?>
      <?php foreach ($neracaa as $key): if($key->id_user==$id_user){if($key->tipe=="Neraca"||$key->tipe="Neraca & Laba Rugi"){ ?>
        <?php $jumlah1 = 0;
        $jumlah2 = 0; ?>
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
        <?php if($key->kode_akun>=1700&&$key->kode_akun<=1999){ ?>
      <tr>
        <td align="center"><?php echo $key->kode_akun;?></td>
        <td><?php echo $key->nama_akun;?></td>
        <td align="center">Rp</td>
        <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4200&&$key->kode_akun<=4999||$key->kode_akun>=5200){ ?>
          <td align="right"><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?><?php if($key->kode_akun>=1900&&$key->kode_akun<=1999){$jumlahb=$jumlahb-($key->saldo_awal+$jumlah1-$jumlah2);}else{$jumlahb=$jumlahb+$key->saldo_awal+$jumlah1-$jumlah2;}?></td>
        <?php }else{ ?>
          <td align="right"><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?><?php if($key->kode_akun>=1900&&$key->kode_akun<=1999){$jumlahb=$jumlahb-($key->saldo_awal+$jumlah2-$jumlah1);}else{$jumlahb=$jumlahb+$key->saldo_awal+$jumlah2-$jumlah1;}?></td>
        <?php } ?>
      </tr>
    <?php }}} endforeach; ?>
    <tr>
      <td align="center" colspan="2">JUMLAH ASSET TETAP</td>
      <td align="center">Rp</td>
      <td align="right"><?php echo number_format($jumlahb,0,"","."); ?></td>
    </tr>
    <tr>
      <td align="center" colspan="2">TOTAL</td>
      <td align="center">Rp</td>
      <td align="right"><?php echo number_format($jumlaha+$jumlahb,0,"","."); ?></td>
    </tr>
      </table>
    </td>
    <!-- End table 1 -->
    <td width="45%">
      <table width=100%>
        <tr>
          <td align="center">KODE</td>
          <td align="center">LIABILITAS</td>
          <td align="center" colspan="2">JUMLAH</td>
        </tr>
        <tr>
          <td colspan="4"></td>
        </tr>
        <tr>
          <td></td>
          <td>LIABILITAS LANCAR</td>
          <td></td>
          <td></td>
        </tr>
          <?php $jumlah1 = 0; ?>
          <?php $jumlah2 = 0; ?>
          <?php $jumlahc = 0; ?>
        <?php foreach ($neracaa as $key): if($key->id_user==$id_user){if($key->tipe=="Neraca"||$key->tipe="Neraca & Laba Rugi"){ ?>
          <?php $jumlah1 = 0;
          $jumlah2 = 0; ?>
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
          <?php if($key->kode_akun>=2000&&$key->kode_akun<=2699){ ?>
        <tr>
          <td align="center"><?php echo $key->kode_akun;?></td>
          <td><?php echo $key->nama_akun;?></td>
          <td align="center">Rp</td>
          <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4200&&$key->kode_akun<=4999||$key->kode_akun>=5200){ ?>
            <td align="right"><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?><?php $jumlahc=$jumlahc+$key->saldo_awal+$jumlah1-$jumlah2;?></td>
          <?php }else{?>
            <td align="right"><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?><?php $jumlahc=$jumlahc+$key->saldo_awal+$jumlah2-$jumlah1;?></td>
          <?php } ?>
        </tr>
      <?php }}} endforeach; ?>
      <tr>
        <td align="center" colspan="2">JUMLAH LIABILITAS LANCAR</td>
        <td align="center">Rp</td>
        <td align="right"><?php echo number_format($jumlahc,0,"","."); ?></td>
      </tr>
      <tr>
        <td colspan="4"><br></td>
      </tr>
      <br>
      <tr>
        <td colspan="4"></td>
      </tr>
      <tr>
        <td></td>
        <td>LIABILITAS JANGKA PANJANG</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <?php $jumlah1 = 0; ?>
      <?php $jumlah2 = 0; ?>
      <?php $jumlahd = 0; ?>
      <?php foreach ($neracaa as $key): if($key->id_user==$id_user){if($key->tipe=="Neraca"||$key->tipe="Neraca & Laba Rugi"){ ?>
        <?php $jumlah1 = 0;
        $jumlah2 = 0; ?>
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
        <?php if($key->kode_akun>=2700&&$key->kode_akun<=2999){ ?>
      <tr>
        <td align="center"><?php echo $key->kode_akun;?></td>
        <td><?php echo $key->nama_akun;?></td>
        <td align="center">Rp</td>
        <<?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4200&&$key->kode_akun<=4999||$key->kode_akun>=5200){ ?>
          <td align="right"><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?><?php $jumlahd=$jumlahd+$key->saldo_awal+$jumlah1-$jumlah2;?></td>
        <?php }else{ ?>
          <td align="right"><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?><?php $jumlahd=$jumlahd+$key->saldo_awal+$jumlah2-$jumlah1;?></td>
        <?php } ?>
      </tr>
    <?php }}} endforeach; ?>
    <tr>
      <td align="center" colspan="2">JUMLAH LIABILITAS JANGKA PANJANG</td>
      <td align="center">Rp</td>
      <td align="right"><?php echo number_format($jumlahd,0,"","."); ?></td>
    </tr>
    <tr>
      <td colspan="4"><br></td>
    </tr>
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td></td>
      <td>TOTAL LIABILITAS JANGKA PANJANG</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <?php $jumlah1 = 0; ?>
    <?php $jumlah2 = 0; ?>
    <?php $jumlahe = 0; ?>
    <?php foreach ($neracaa as $key): if($key->id_user==$id_user){if($key->tipe=="Neraca"||$key->tipe="Neraca & Laba Rugi"){ ?>
      <?php $jumlah1 = 0;
      $jumlah2 = 0; ?>
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
      <?php if($key->kode_akun>=3000&&$key->kode_akun<=3999){ ?>
    <tr>
      <td align="center"><?php echo $key->kode_akun;?></td>
      <td><?php echo $key->nama_akun;?></td>
      <td align="center">Rp</td>
      <?php if($key->kode_akun>=1000&&$key->kode_akun<=1699||$key->kode_akun>=1700&&$key->kode_akun<=1899||$key->kode_akun>=3200&&$key->kode_akun<=3399||$key->kode_akun>=4200&&$key->kode_akun<=4999||$key->kode_akun>=5200){ ?>
        <td align="right"><?php echo number_format($key->saldo_awal+$jumlah1-$jumlah2,0,"","."); ?><?php if($key->kode_akun>=3200&&$key->kode_akun<=3399){$jumlahe=$jumlahe-($key->saldo_awal+$jumlah1-$jumlah2);}else{$jumlahe=$jumlahe+$key->saldo_awal+$jumlah1-$jumlah2;}?></td>
      <?php }else{ ?>
        <td align="right"><?php echo number_format($key->saldo_awal+$jumlah2-$jumlah1,0,"","."); ?><?php if($key->kode_akun>=5151&&$key->kode_akun<=5199){$jumlahe=$jumlahe-($key->saldo_awal+$jumlah2-$jumlah1);}else{$jumlahe=$jumlahe+$key->saldo_awal+$jumlah2-$jumlah1;}?></td>
      <?php } ?>
    </tr>
  <?php }}} endforeach; ?>
  <tr>
    <td align="center" colspan="2">JUMLAH TOTAL LIABILITAS JANGKA PANJANG</td>
    <td align="center">Rp</td>
    <td align="right"><?php echo number_format($jumlahe,0,"",".");; ?></td>
  </tr>
        <tr>
          <td align="center" colspan="2">TOTAL</td>
          <td align="center">Rp</td>
          <td align="right"><?php echo number_format($jumlahc+$jumlahd+$jumlahe,0,"","."); ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</center>
<div class="paragraph">
  <p>Medan,</p>
  <?php foreach($user as $u): if($u->id==$id_user){ ?>
  <h3 class="peru"><?php echo $u->nama_perusahaan; ?></h3>
  <h3 class="pem"><?php echo $u->nama_pimpinan; ?></h3>
  <p class="dir">Direktur</p>
  <?php  } endforeach;?>
</div>
<!--END-->
</body>
</html>
