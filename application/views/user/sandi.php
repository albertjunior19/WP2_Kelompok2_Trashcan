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
						<div class="row">
							<div class="col-md-6 text-left">
								<tr>
									<td>Nama : <?php echo $profilanda['nama_lengkap']; ?></td><br>
							    	<td>Email : <?php echo $profilanda['email']; ?></td><br>
							    	<td>User Sejak : <?php echo date('d-m-Y H:i:s', strtotime($profilanda['user_created'])); ?></td>
								</tr>
							</div>
							<div class="col-md-6 text-left">
								<form action="" method="post">
									<div class="form-group">
										<input type="password" name="sandi2" class="form-control" placeholder="Password baru">
										<small class="text-danger"><?php echo form_error('sandi2'); ?></small>
									</div>
									<div class="form-group">
										<input type="password" name="sandi1" class="form-control" placeholder="Konfirmasi password baru">
										<small class="text-danger"><?php echo form_error('sandi1'); ?></small>
									</div>
									<div class="form-group">
										<input type="password" name="sandi" class="form-control" placeholder="Konfirmasi password lama">
										<small class="text-danger"><?php echo form_error('sandi'); ?></small>
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
