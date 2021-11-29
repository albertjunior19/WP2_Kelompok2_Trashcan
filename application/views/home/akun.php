<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Akun</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="<?php echo base_url(); ?>">home</a></li>
							<li><span>Login</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		
		<!-- Login Page -->
		<div class="login_page_area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="create_account_area caa_pdngbtm">
							<h2 class="caa_heading">Buat Akun</h2>
							<div class="caa_form_area">
								<p>Masukkan Data Anda</p>
								<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
								<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
								<form action="<?php echo base_url(); ?>register" method="post">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="caa_form_group">
									<div class="caf_form">
										<label>Nama</label>
										<div class="input-area"><input type="text" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="" /><small class="text-danger"><?php echo form_error('nama'); ?></small></div>
									</div>
									<div class="caf_form">
										<label>No HP</label>
										<div class="input-area"><input type="number" name="telepon" value="<?php echo set_value('telepon'); ?>" autofocus="" /><small class="text-danger"><?php echo form_error('telepon'); ?></small></div>
									</div>
									<div class="caf_form">
										<label>Email</label>
										<div class="input-area"><input type="text" name="email_reg" value="" /><small class="text-danger"><?php echo form_error('email_reg'); ?></small></div>
									</div>
									<div class="caf_form">
										<label>Sandi</label>
										<div class="input-area"><input type="password" name="password1" /><small class="text-danger"><?php echo form_error('password1'); ?></small></div>
									</div>
									<div class="caf_form">
										<label>Konfirmasi Ulang Sandi</label>
										<div class="input-area"><input type="password" name="password2" /><small class="text-danger"><?php echo form_error('password2'); ?></small></div>
									</div>
									<button class="btn btn-default acc_btn" type="submit" id="acc_Create"> 
										<span> <i class="fa fa-user btn_icon"></i> Buat akun </span> 
									</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="create_account_area">
							<h2 class="caa_heading">Sudah Terdaftar ?</h2>
							<form action="<?php echo base_url(); ?>login" method="post">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="caa_form_area">
								<div class="caa_form_group">
									<div class="login_email">
										<label>Email</label>
										<div class="input-area"><input type="text" name="email" /><small class="text-danger"><?php echo form_error('email'); ?></small></div>
									</div>
									<div class="login_password">
										<label>Sandi</label>
										<div class="input-area"><input type="password" name="password" /><small class="text-danger"><?php echo form_error('password'); ?></small></div>
									</div>
									<button type="submit" id="acc_Login" class="btn btn-default acc_btn"> 
										<span> <i class="fa fa-lock btn_icon"></i> Login </span> 
									</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	