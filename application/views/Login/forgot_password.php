<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('include/head'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?= base_assets(); ?>vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Forgot Password</h2>
			<form method="POST" action="<?= site_url('forgot_password/submit'); ?>">

				<p>Enter your username to reset your password</p>
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					<?php if ($this->session->flashdata('error_username')): ?>
						<span style="font-weight: bold;color:red;font-style: italic">
							<?= $this->session->flashdata('error_username'); ?>
						</span>
					<?php endif ?>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
							-->
							<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password"><a href="<?= site_url('login'); ?>" class="btn btn-outline-primary btn-lg btn-block">Sign In</a></div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php $this->load->view('include/script'); ?>
</body>
</html>