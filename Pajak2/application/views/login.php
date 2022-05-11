<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<div class="login100-form validate-form">
					<?php echo form_open('pajak2/login1'); ?>
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: blank">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>
				</div>
			</form>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#register" data-toggle="modal" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/js/main.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

</body>
</html>

	<!-- Modal -->
	<div id="register" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
			<?php echo form_open('pajak2/register') ?>
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Form Register</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
	          <label for="">Username</label>
	          <input type="text" name="username" class="form-control" id="username" onkeyup="cekUser(this.value)" required>
	        </div>
	        <div class="form-group">
	          <label for="">Password</label>
	          <input type="password" name="password" class="form-control" id="password" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" name="submit" class="btn btn-success" id="submit" value="Register">
	      </div>
	    </div>
			</form>

	  </div>
	</div>
	<script type="text/javascript">
  	function cekUser(username){
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
	</script>
