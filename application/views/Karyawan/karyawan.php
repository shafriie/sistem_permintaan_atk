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
								<h4>Mengelola Data Karyawan</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Karyawan</li>
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
					<div class="row">
						<table class="stripe hover multiple-select-row data-table-export nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th>Username</th>
									<th>Password</th>
									<th>Nama</th>
									<th>Departemen</th>
									<th>Jenis Kelamin</th>
									<th>Tempat Lahir</th>
									<th>Tanggal Lahir</th>
									<th>Agama</th>
									<th>Alamat</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rows as $key => $val): ?>
								<?php $primaryKey = $val->username; ?>
								<tr>
									<td class="table-plus"><?= $key + 1 . '.' ?></td>
									<td><?= $val->username ?></td>
									<td><?= $val->password ?></td>
									<td><?= $val->nama ?></td>
									<td><?= $val->kd_departemen ?></td>
									<td><?= $val->jenis_kelamin ?></td>
									<td><?= $val->tempat_lahir ?></td>
									<td><?= $val->tanggal_lahir ?></td>
									<td><?= $val->agama ?></td>
									<td><?= $val->alamat ?></td>
									<td align="center">
										<a id="<?= base64_encode($primaryKey) ?>" href="#" title="Edit <?= $primaryKey ?>" class="btn btn-primary btn-sm btn-edit-data"><i class="fa fa-pencil"></i></a>
										<a id="<?= base64_encode($primaryKey) ?>" href="javascript:void(0)" title="Hapus <?= $primaryKey ?>" class="btn btn-primary btn-sm btn-delete-data"><i class="fa fa-trash"></i></a>
									</td>
								</tr>	
								<?php endforeach ?>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
			</div>

			<!-- Modal Form -->
			<form id="form-atk">
			<div class="modal fade bs-example-modal-lg" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Form Karyawan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="action" value="">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Username</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" name="username" placeholder="Username">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Password</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" name="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" name="nama" placeholder="Nama Lengkap" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Kode Departemen</label>
								<div class="col-sm-12 col-md-10">
									<select name="kd_departemen" class="form-control">
										<option value="">-- Pilih --</option>
										<?php foreach ($departemens as $key => $value): ?>
											<option value="<?= $value->kd_departemen ?>"><?= $value->nama_departemen ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-12 col-md-10">
									<select name="jenis_kelamin" class="form-control">
										<option value="">-- Pilih --</option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Tempat Lahir</label>
								<div class="col-sm-12 col-md-10">
									<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-12 col-md-10">
									<input type="date" name="tanggal_lahir" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Agama</label>
								<div class="col-sm-12 col-md-10">
									<select name="agama" class="form-control">
										<option value="">-- Pilih --</option>
										<?php $agama = data_agama(); ?>
										<?php for ($i=0; $i < count($agama) ; $i++) { ?>
											<option value="<?= $agama[$i] ?>"><?= $agama[$i]; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
								<div class="col-sm-12 col-md-10">
									<textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary btn-submit-form">Save</button>
						</div>
					</div>
				</div>
			</div>
			</form>
			<!-- End Modal Form -->

			<!-- Modal Delete -->
			<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body text-center font-18">
							<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to delete?</h4>
							<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
								<div class="col-6">
									<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
									NO
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn btn-yes-delete" data-dismiss="modal"><i class="fa fa-check"></i></button>
									YES
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal Delete -->

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
	<script src="<?= base_url('assets/'); ?>js/karyawan.js"></script>
	<!-- add sweet alert js & css in footer -->
	<script src="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.css">
</body>
</html>