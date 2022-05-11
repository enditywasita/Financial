<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	</head>
	<body>
		<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<hr/>
					<div class="modal-body">
						<div class="form-group">
                  <label for="NIM">Username</label>
                  <input type="text" class="form-control" name="username" id="username" onkeyup="(this.value)">
                  <font color="" id="notif">Disini respon data akan dicek</font>
              </div>
						<div class="form-group">
                  <label for="EMAIL">Email</label>
                  <input type="email" class="form-control" name="email" id="email" onkeyup="cekEmail(this.value)">
                  <font color="" id="notif1">Disini respon data akan dicek</font>
              </div>
							<!-- <script type="text/javascript">
								function cekUsername(username){
									$.ajax({
										url:'<?php echo base_url('pajak2/cekUser/');?>',
										type:'get',
										data:'username='+username,
										success:function(msg){
											if (msg == 'true') {
												$("#notif").text('Username sudah ada!');
												$("#notif").prop('color','red');
												$("#submit").attr('disabled',true);
											}else if (msg == 'false') {
												$("#notif").text('Username dapat digunakan!');
												$("#notif").prop('color','green');
												$("#submit").attr('disabled',false);
											}
										},error:function(){
											alert('Terjadi kesalahan')
										}
									});
								}
							</script> -->

							<script type="text/javascript">
              function cekEmail(email){
                $.ajax({
                  url:'<?php echo base_url('pajak2/cekEmail/');?>',
                  type:'get',
                  data:'email='+email,
                  success:function(msg){
                    if (msg == "true") {
                      $("#notif1").text('Data email sudah ada!');
                      $("#notif1").prop('color','red');
                      $("#daftar").attr('disabled',true);
                    }else if (msg == "false") {
                      $("#notif1").text('Data email dapat digunakan!');
                      $("#notif1").prop('color','green');
                      $("#daftar").attr('disabled',false);
                    }
                  },error:function(){
                    alert('Terjadi kesalahan')
                  }
                });
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
