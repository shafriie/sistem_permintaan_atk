<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('include/head'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="<?= base_assets(); ?>vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Change Password</h2>
			<form method="POST" action="<?= site_url('forgot_password/submit_password/'.$username); ?>">
				<input type="hidden" name="username" value="<?= $username ?>">
				<div class="input-group custom input-group-lg">
					
					<input type="password" class="form-control" name="old_password" placeholder="Old Password" value="<?= set_value('old_password'); ?>">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
					</div>
					<?php if ($this->session->flashdata('error_old_password')): ?>
						<span style="font-weight: bold;color:red;font-style: italic">
							<?= $this->session->flashdata('error_old_password'); ?>
						</span>
					<?php endif ?>
				</div>
				<div class="input-group custom input-group-lg">
					
					<input type="password" class="form-control" name="new_password" placeholder="New Password" value="<?= set_value('new_password'); ?>">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
					</div>
					<?php if ($this->session->flashdata('error_new_password')): ?>
						<span style="font-weight: bold;color:red;font-style: italic">
							<?= $this->session->flashdata('error_new_password'); ?>
						</span>
					<?php endif ?>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" name="retype_password" placeholder="Retype Password" value="<?= set_value('retype_password'); ?>">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
					</div>
					<?php if ($this->session->flashdata('error_retype_password')): ?>
						<span style="font-weight: bold;color:red;font-style: italic">
							<?= $this->session->flashdata('error_retype_password'); ?>
						</span>
					<?php endif ?>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Change Password</button>
						</div>
					</div>
					
				</div>
			</form>
		</div>
	</div>
	<?php $this->load->view('include/script'); ?>
</body>
</html>