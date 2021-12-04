<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $detailblog['blog_judul']; ?></h3>
			</div>

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="<?php echo base_url(); ?>">home</a></li>
					<li><a href="<?php echo base_url(); ?>blog">artikel</a></li>
					<li><span><?php echo $detailblog['blog_judul']; ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Blog Details Page -->
<div id="blog_page_area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<!-- Single blog -->
				<div class="single_blog">
					<div class="single_blog_img">
						<img src="<?php echo base_url(); ?>assets_home/img/blog/<?php echo $detailblog['blog_gambar']; ?>" alt="<?php echo $detailblog['blog_judul']; ?>">
						<div class="blog_date text-center">
							<div class="bd_day"> <?php echo date('d', strtotime($detailblog['blog_tgl'])); ?></div>
							<div class="bd_month"><?php echo date('M', strtotime($detailblog['blog_tgl'])); ?></div>
						</div>
					</div>

					<div class="blog_content ">
						<ul class="post-bar">
							<li><i class="fa fa-user"></i> Admin</li>
							<!-- <li><i class="fa fa-comments-o"></i> <a href="#">2 comments</a></li>
										<li><i class="fa fa-heart-o"></i> <a href="#">4 like</a></li> -->
						</ul>
						<p class="blog_dtls_page"><?php echo $detailblog['blog_isi']; ?></p>
					</div>
				</div>
				<!-- End Single blog -->

				<!-- Blog Comments -->
				<!-- <div class="row">
							<div class="col-md-12">
								<div class="blog_comment_area">
									<h2 class="comments-title">2 Comments</h2>
									<ul class="comment_inner fix">
										<li>
											<div class="single_cmnt fix">
												<div class="blog_cmnt_img"><img src="<?php echo base_url(); ?>assets_home/img/comment/1.jpg" alt="" /></div>
												<div class="cmnt_content fix">
													<h4>Johns Clark</h4>
													<div class="com_date">2018 2 February</div>
													<a href="#"><i class="fa fa-reply-all"></i></a>
													<p>Shabby chic selfies pickled Tumblr letterpress iPhone. Wolf vegan retro selvage literally Wes Anderson ethical four loko. Meggings blog chambray tofu pour-over..</p>
												</div>
											</div>
											<ul>
												<li>
												<div class="single_cmnt fix">
													<div class="blog_cmnt_img"><img src="<?php echo base_url(); ?>assets_home/img/comment/2.jpg" alt="" /></div>
													<div class="cmnt_content fix">
														<h4>Johns Clark</h4>
														<div class="com_date">2018 2 February</div>
														<a href="#"><i class="fa fa-reply-all"></i></a>
														<p>Shabby chic selfies pickled Tumblr letterpress iPhone. Wolf vegan retro selvage literally Wes Anderson ethical four loko.</p>
													</div>
												</div>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							 -->

				<!-- <div class="col-md-12">
							
								<div class="blog_cmnt_form fix text-left">
									<h2 id="reply-title">LEAVE A COMMENT</h2>
									<form action="#">
										<div class="form-row">
											<div class="col-sm-6">
												<div class="input-area"><input type="text" class="form-control" placeholder="Name*" /></div>												
											</div>	

											<div class="col-sm-6">
												<div class="input-area"><input type="text" class="form-control" placeholder="Email*" /></div>							
											</div>
										</div>
										<div class="input-area"><input type="text" class="form-control" placeholder="Subject" /></div>
										<div class="input-area"><textarea name="message" placeholder="Message"></textarea></div>
										<input class="btn border-btn" type="submit" value="Comment" />
									
									</form>
								</div>				
							</div> -->

			</div>
		</div>

		<!-- Blog Sidebar -->
		<!-- <div class="col-md-4 col-xs-12">
			<div class="single_sidebar search_widget">
				<h3 class="sdbr_title">Cari</h3>
				<div class="sdbr_inner">
					<form class="search_form" method="post" action="<?php echo base_url(); ?>search">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="text" class="form-control search_input" name="s" id="s" placeholder="Search Here ...">
						<button type="submit" class="search_button"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
		</div> -->
	</div>
</div>