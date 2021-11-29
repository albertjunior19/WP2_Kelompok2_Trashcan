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
		
		
		<!-- Login Page -->
		<div class="login_page_area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="create_account_area">
							<h2 class="caa_heading">Forgot password?</h2>
							<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
							<div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
							<form action="" method="post">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<div class="caa_form_area">
								<div class="caa_form_group">
									<div class="login_email">
										<label>Email</label>
										<div class="input-area"><input type="text" name="email" autofocus="" /><small class="text-danger"><?php echo form_error('email'); ?></small></div>
									</div>
									<button type="submit" id="acc_Login" class="btn btn-default acc_btn"> 
										<span> <i class="fa fa-refresh btn_icon"></i> Reset </span> 
									</button>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						
					</div>
				</div>
			</div>
		</div>	