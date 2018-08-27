<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('include/head'); ?>
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<body>
	<?php $this->load->view('include/header'); ?>
	<?php $this->load->view('include/sidebar'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form Permintaan ATK</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Permintaan ATK</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary btn-add-form" href="javascript:void(0)">
									Add Data <i class="fa fa-plus-square"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Export Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<!-- <h5 class="text-blue">Data Table with Export Buttons</h5> -->
						</div>
					</div>
					<form method="POST" action="<?= site_url('permintaan/submit'); ?>">
					<div class="row">
						<div class="modal-body">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Username</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="username" placeholder="Username" value="<?= $this->session->userdata('sess_username'); ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Tanggal Permintaan</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" name="tanggal_permintaan" placeholder="Tanggal Permintaan" type="date" value="<?= date('Y-m-d'); ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" name="nama" placeholder="Nama Lengkap" type="text" value="<?= $this->session->userdata('sess_nama'); ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Kode Departemen</label>
								<div class="col-sm-12 col-md-10">
									<select name="kd_departemen" class="form-control">
										<option value="">-- Pilih --</option>
										<?php foreach ($departemens as $key => $value): ?>
										<?php if($value->kd_departemen == $this->session->userdata('sess_departemen')){ $p='selected'; } else { $p=''; } ?>
											<option value="<?= $value->kd_departemen ?>" <?= $p; ?> ><?= $value->nama_departemen ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<table id="table-detail" class="table table-bordered" style="margin-top: 20px">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode ATK</th>
											<th>Nama ATK</th>
											<th>Sisa Stok</th>
											<th>Stok Request</th>
											<th>Satuan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</div>
							
							<div align="center">
								<button type="submit" class="btn btn-primary">Submit</button>
								<!-- <button type="reset" class="btn btn-primary">Reset</button> -->
							</div>
						</div>
						
					</div>
					</form>
				</div>
				<!-- Export Datatable End -->
			</div>

			<?php $this->load->view('include/footer'); ?>
		</div>
	</div>
	<?php $this->load->view('include/script'); ?>
	<script>var siteUrl='<?= site_url(); ?>';</script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="<?= base_assets(); ?>src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script src="<?= base_url('assets/'); ?>js/form_permintaan.js"></script>
	<!-- add sweet alert js & css in footer -->
	<script src="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.css">
</body>
</html>