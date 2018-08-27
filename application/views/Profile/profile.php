<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('include/head'); ?>
	<link rel="stylesheet" type="text/css" href="<?= base_assets(); ?>src/plugins/cropperjs/dist/cropper.css">
</head>
<body>
	<?php $this->load->view('include/header'); ?>
	<?php $this->load->view('include/sidebar'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="<?= base_assets(); ?>vendors/images/photo2.jpg" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="<?= base_assets(); ?>vendors/images/photo2.jpg" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center"><?= $this->session->userdata('sess_nama'); ?></h5>
							<br>
							<div class="profile-info">
								<h5 class="mb-20 weight-500">Contact Information</h5>
								<ul>
									<li>
										<span>Level:</span>
										<?= $rows->level == 1?'General Affair':'Karyawan' ?>
									</li>
									<li>
										<span>Departemen:</span>
										<?= $rows->nama_departemen ?>
									</li>
									<li>
										<span>Tempat Lahir:</span>
										<?= $rows->tempat_lahir ?>
									</li>
									<li>
										<span>Tanggal Lahir:</span>
										<?= date('d F Y',strtotime($rows->tanggal_lahir)) ?>
									</li>
									<li>
										<span>Agama:</span>
										<?= $rows->agama ?>
									</li>
									<li>
										<span>Jenis Kelamin:</span>
										<?= $rows->jenis_kelamin == 'L'?'Laki-laki':'Perempuan' ?>
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 weight-500">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
								</ul>
							</div>
							<div class="profile-skills">
								<h5 class="mb-20 weight-500">Key Skills</h5>
								<h6 class="mb-5">HTML</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Css</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">jQuery</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Bootstrap</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										
										
										<!-- Setting Tab start -->
										<div class="tab-pane active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form method="POST" action="<?= site_url('profile/submit'); ?>">
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-12">
															<h4 class="text-blue mb-20">Edit Your Personal Setting</h4>
															<div class="form-group">
																<label>Username</label>
																<input class="form-control form-control-lg" type="text" name="username" value="<?= $rows->username ?>" readonly>
															</div>
															<div class="form-group">
																<label>Password</label>
																<input class="form-control form-control-lg" type="password" name="password" value="<?= $rows->password ?>">
															</div>
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input class="form-control form-control-lg" type="text" name="nama" value="<?= $rows->nama ?>">
															</div>
															<div class="form-group">
																<label>Departemen</label>
																<select name="kd_departemen" class="form-control form-control-lg">
																	<option value="">-- Pilih --</option>
																	<?php foreach ($departemens as $key => $value): ?>
																	<?php if($rows->kd_departemen == $value->kd_departemen){ $p='selected'; }else{ $p=''; } ?>
																		<option value="<?= $value->kd_departemen ?>" <?= $p; ?>><?= $value->nama_departemen ?></option>
																	<?php endforeach ?>
																</select>
															</div>
															<div class="form-group">
																<label>Gender</label>
																<div class="d-flex">
																<div class="custom-control custom-radio mb-5 mr-20">
																	<input value="L" type="radio" id="customRadio4" name="jenis_kelamin" class="custom-control-input" <?= $rows->jenis_kelamin == 'L'?'checked':'' ?> >
																	<label class="custom-control-label weight-400" for="customRadio4">Laki-laki</label>
																</div>
																<div class="custom-control custom-radio mb-5">
																	<input value="P" type="radio" id="customRadio5" name="jenis_kelamin" class="custom-control-input" <?= $rows->jenis_kelamin == 'P'?'checked':'' ?>>
																	<label class="custom-control-label weight-400" for="customRadio5"  >Perempuan</label>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label>Tempat Lahir</label>
																<input type="text" name="tempat_lahir" class="form-control form-control-lg" placeholder="Tempat Lahir" value="<?= $rows->tempat_lahir ?>">
															</div>
															<div class="form-group">
																<label>Tanggal Lahir</label>
																<input type="date" name="tanggal_lahir" class="form-control" value="<?= $rows->tanggal_lahir ?>">
															</div>
															<div class="form-group">
																<label>Agama</label>
																<select name="agama" class="form-control">
																	<option value="">-- Pilih --</option>
																	<?php $agama = data_agama(); ?>
																	<?php for ($i=0; $i < count($agama) ; $i++) { ?>
																	<?php if($rows->agama == $agama[$i]){ $p='selected'; } else{ $p=''; } ?>
																		<option value="<?= $agama[$i] ?>" <?= $p; ?> ><?= $agama[$i]; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label>Alamat</label>
																<textarea class="form-control" rows="5" name="alamat" placeholder="Alamat"><?= $rows->alamat; ?></textarea>
															</div>
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Information">
															</div>
														</li>
														
													</ul>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('include/script'); ?>
	<script src="<?= base_assets(); ?>src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>