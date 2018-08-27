	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= site_url('dashboard'); ?>">
				<!-- <img src="<?= base_assets(); ?>vendors/images/deskapp-logo.png" alt=""> -->
				Sistem ATK
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="<?= site_url('dashboard'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<?php if ($this->session->userdata('sess_level') == 1): ?>
					<li class="dropdown">
						<a href="<?= site_url('atk'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-tasks"></span><span class="mtext">Mengelola ATK</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="<?= site_url('karyawan'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-user-plus"></span><span class="mtext">Mengelola Karyawan</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="<?= site_url('departemen'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-bank"></span><span class="mtext">Mengelola Departemen</span>
						</a>
					</li>	
					<?php endif ?>
					<li>
						<a href="<?= site_url('permintaan'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-suitcase"></span><span class="mtext">Permintaan ATK</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="<?= site_url('laporan'); ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-newspaper-o"></span><span class="mtext"> Laporan Permintaan ATK </span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>