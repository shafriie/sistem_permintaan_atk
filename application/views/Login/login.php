<!DOCTYPE html>
<html>
<head>
	 <?php $this->load->view('include/head'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?= base_assets(); ?>vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Login</h2>
			<form action="<?= site_url('login/submit') ?>" method="POST">
				<?php if ($this->session->flashdata('msg')): ?>
					<p class="alert alert-danger"><?= $this->session->flashdata('msg'); ?></p>
				<?php endif ?>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="**********" name="password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							
								<!-- use code for form submit -->
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							
							<!-- <a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Sign In</a> -->

						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password padding-top-10"><a href="<?= site_url('forgot_password'); ?>">Forgot Password</a></div>
					</div>
				</div>
			</form>
		</div>
	</div>
		<!-- js -->
	<?php $this->load->view('include/script'); ?>
</body>
</html>