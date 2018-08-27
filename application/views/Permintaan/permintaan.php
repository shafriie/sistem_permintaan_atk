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
								<h4>Mengelola Data Permintaan ATK</h4>
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
								<!-- <a class="btn btn-primary btn-add-form" href="javascript:void(0)">
									Add Data <i class="fa fa-plus-square"></i>
								</a> -->
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
									<th>Nama</th>
									<th>Tanggal Permintaan</th>
									<th>Departemen</th>
									<th>Kode ATK</th>
									<th>Nama ATK</th>
									<th>Stok Request</th>
									<th>Satuan</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rows as $key => $val): ?>
								<?php $primaryKey = $val->id_detail; ?>
								<tr>
									<td class="table-plus"><?= $key + 1 . '.' ?></td>
									<td><?= $val->nama ?></td>
									<td><?= date('d F Y',strtotime($val->tanggal_permintaan)) ?></td>
									<td><?= $val->nama_departemen ?></td>
									<td><?= $val->kode_atk ?></td>
									<td><?= $val->nama_atk ?></td>
									<td><?= $val->stok_request ?></td>
									<td><?= $val->satuan ?></td>
									<td>
										<?php if($val->status == 1){$s = '<span class="badge badge-warning">Pending</span>';} ?>
										<?php if($val->status == 2){$s = '<span class="badge badge-danger">Progress</span>';} ?>
										<?php if($val->status == 3){$s = '<span class="badge badge-info">Reject</span>';} ?>
										<?php if($val->status == 4){$s = '<span class="badge badge-success">Kirim</span>';} ?>
										<?= $s; ?>
									</td>
									<td align="center">
										<a id="<?= base64_encode($primaryKey) ?>" href="#" title="Edit Status" class="btn btn-primary btn-sm btn-edit-data"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>	
								<?php endforeach ?>
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->

				<!-- Modal Form -->
				<form id="form-data">
				<div class="modal fade bs-example-modal-lg" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Ganti Status</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="id_detail" value="">
								<input type="hidden" name="kode_atk" value="">
								<input type="hidden" name="stok_request" value="">
								<input type="hidden" name="sisa_stok" value="">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Status</label>
									<div class="col-sm-12 col-md-10">
										<select name="status" id="status" class="form-control">
											<option value="">-- Pilih --</option>
											<option value="1">Pending</option>
											<option value="2">Progress</option>
											<option value="3">Reject</option>
											<option value="4">Kirim</option>
										</select>
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
	<script src="<?= base_url('assets/'); ?>js/permintaan.js"></script>
	<!-- add sweet alert js & css in footer -->
	<script src="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/sweetalert2/sweetalert2.css">
</body>
</html>