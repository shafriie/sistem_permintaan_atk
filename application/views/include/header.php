	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<!-- <img src="<?= base_assets(); ?>vendors/images/logo.png" alt="" class="mobile-logo"> -->
					S
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name"><?= $this->session->userdata('sess_nama'); ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?= site_url('profile'); ?>"><i class="fa fa-user-md" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>