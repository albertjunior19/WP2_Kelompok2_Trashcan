<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $title; ?></h3>
			</div>

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="<?php echo base_url(); ?>">home</a></li>
					<li><span><?php echo $title; ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Cart Page -->
<div class="cart_page_area">
	<div class="container">
		<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
		<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
		<div class="cart-actions cart-button-cuppon">
			<div class="cuppon-wrap text-center">
				<h3><?php echo $title; ?></h3>
				<div class="row mt-5">
					<div class="col-md-4 text-left mt-3">
						<tr>
							<td>Nama : <?php echo $profilanda['nama_lengkap']; ?></td><br>
							<td>Email : <?php echo $profilanda['email']; ?></td><br>
							<td>No HP : <?php echo $profilanda['telepon']; ?></td><br>
							<td>User Sejak : <?php echo date('d-m-Y H:i:s', strtotime($profilanda['user_created'])); ?></td>
						</tr>
						<br><br>
						<tr>
							<td>
								<?php if ($profilanda['fotoprofil'] != "") { ?>
									<img width="150px" src="<?= base_url('upload/fotoprofil/' . $profilanda['fotoprofil']) ?>">
								<?php } else { ?>
									<img width="150px" src="<?= base_url('upload/fotoprofil/user.png') ?>">
								<?php } ?>
							</td>
						</tr>
					</div>
					<div class="col-md-8 text-left">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="nama" class="form-control" value="<?php echo $profilanda['nama_lengkap']; ?>">
								<small class="text-danger"><?php echo form_error('nama'); ?></small>
							</div>
							<div class="form-group">
								<input type="number" name="telepon" class="form-control" value="<?php echo $profilanda['telepon']; ?>">
								<small class="text-danger"><?php echo form_error('telepon'); ?></small>
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" value="<?php echo $profilanda['email']; ?>">
								<small class="text-danger"><?php echo form_error('email'); ?></small>
							</div>
							<div class="form-group">
								<label>Foto Profil</label>
								<input type="file" name="fotoprofil" class="form-control">
								<small class="text-danger"><?php echo form_error('fotoprofil'); ?></small>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Konfirmasi password anda">
								<small class="text-danger"><?php echo form_error('password'); ?></small>
							</div>
							<div class="form-group">
								<button type="submit" class="btn border-btn">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>