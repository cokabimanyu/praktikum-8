<?php $this->load->view ('admin/layout/header', $data) ?>
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('img/logo.png') ?>" style="max-width: 50px" alt=""></a>
		</div>
		<div>
        	<?php echo Session::flash('error'); ?>
      	</div>
		
		<div class="login-box-body">
	  
			<p class="login-box-msg">Login untuk melanjutkan memakai aplikasi</p>

			<form action="<?php echo base_url('dologin') ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Username" name="username">
					<span class="form-control-feedback"><i class="fa fa-user"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="form-control-feedback"><i class="fa fa-lock"></i></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
		<div class="text-center" style="display: block;margin-top: 10px;">
			<a href="<?php echo base_url('register') ?>">Belum punya akun? Silahkan daftar disini!</a>
		</div>
	</div>
	<!-- /.login-box -->
<?php view('admin/partial/footer', $data) ?>
<script>
  $(function () {
	$('input').iCheck({
	  checkboxClass: 'icheckbox_square-blue',
	  radioClass: 'iradio_square-blue',
	  increaseArea: '20%' /* optional */
	});
  });
</script>