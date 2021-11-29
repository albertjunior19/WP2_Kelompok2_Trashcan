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

<div class="contact_page_area fix">
	<div class="container">
		<div class="row">
			<div class="contact_info col-lg-6 col-md-12 col-xs-12">
				<h3>Kontak Kami</h3>
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-map-marker"></i></div>
					<p>Alamat :<br />Jalan Margahayu Raya blok C No. 85 RT.04/015 Kelurahan Margahayu Kecamatan Bekasi Timur </p>
				</div>
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-phone"></i></div>
					<p>Telp / WhatsApp :</p>
					<p>0898 838 7271</p>
				</div>
				<div class="single_info">
					<div class="con_icon"><i class="fa fa-envelope"></i></div>
					<a>Email :</a> <br />
					<a href="#">Tes</a>
				</div>
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.067832797616!2d107.01607881537012!3d-6.254793962982649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698e7cd255782f%3A0x636a80afc3c5b927!2sApotek%20Kessy!5e0!3m2!1sid!2sid!4v1632885007217!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>
		<div class="row">
			<div class="contact_frm_area text-left col-lg-12 col-md-12 col-xs-12">
				<h3>Kirim Pesan</h3>
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<form action="" method="post">
					<div class="form-row">
						<div class="form-group col-sm-6"><input type="text" name="nama" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" placeholder="Nama*" /><small class="text-danger"><?php echo form_error('nama'); ?></small></div>
						<div class="form-group col-sm-6"><input type="text" name="mail" value="<?php echo $this->session->userdata('usermail'); ?>" class="form-control" placeholder="Email*" /><small class="text-danger"><?php echo form_error('mail'); ?></small></div>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Judul" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nohp" placeholder="No HP" />
					</div>
					<div class="form-group">
						<textarea name="message" class="form-control" placeholder="Pesan"></textarea><small class="text-danger"><?php echo form_error('message'); ?></small>
					</div>

					<div class="input-area submit-area"><button class="btn border-btn" type="submit">Kirim</button></div>

				</form>
			</div>
		</div>
	</div>
</div>
<br><br><br><br><br><br><br>