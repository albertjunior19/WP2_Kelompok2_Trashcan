<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $title; ?> '<?php echo $s; ?>'</h3>
			</div>

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="<?php echo base_url(); ?>">home</a></li>
					<li><span>Blog</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Blog Page -->
<div id="blog_page_area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				<!-- Single blog -->
				<?php foreach ($artikel as $art) : ?>
					<div class="single_blog">
						<div class="single_blog_img">
							<a href="<?php echo base_url(); ?>artikel/<?php echo $art['blog_url']; ?>"><img src="<?php echo base_url(); ?>assets_home/img/blog/<?php echo $art['blog_gambar']; ?>" alt="<?php echo $art['blog_judul']; ?>"></a>
							<div class="blog_date text-center">
								<div class="bd_day"> <?php echo date('d', strtotime($art['blog_tgl'])); ?></div>
								<div class="bd_month"><?php echo date('M', strtotime($art['blog_tgl'])); ?></div>
							</div>
						</div>

						<div class="blog_content">
							<h4 class="post_title"><a href="<?php echo base_url(); ?>artikel/<?php echo $art['blog_url']; ?>"><?php echo $art['blog_judul']; ?></a> </h4>
							<ul class="post-bar">
								<li><i class="fa fa-user"></i> Admin</li>
								<!-- <li><i class="fa fa-comments-o"></i> <a href="#">2 comments</a></li>
									<li><i class="fa fa-heart-o"></i> <a href="#">4 like</a></li> -->
							</ul>
							<p>
								<?php echo word_limiter($art['blog_isi'], 13); ?>

							</p>
						</div>
					</div>
					<!-- End Single blog -->

				<?php endforeach; ?>
				<!-- <div class="blog_pagination pgntn_mrgntp fix">
					<div class="pagination text-center">
						<ul>
							<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#" class="active">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
						</ul>
					</div>
				</div> -->
			</div>

			<!-- Blog Sidebar -->
			<div class="col-md-4 col-xs-12">
				<div class="single_sidebar search_widget">
					<h3 class="sdbr_title">Cari</h3>
					<div class="sdbr_inner">
						<form class="search_form" method="post" action="<?php echo base_url(); ?>search">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input type="text" class="form-control search_input" name="s" id="s" placeholder="Cari disini ...">
							<button type="submit" class="search_button"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>

				<!-- <div class="single_sidebar category">
							<h3 class="sdbr_title">categories</h3>
							<div class="sdbr_inner">
								<ul>
									<li><a href="#">Women</a></li>
									<li><a href="#">Men</a></li>
									<li><a href="#">Kids</a></li>
									<li><a href="#">Jewelry</a></li>
									<li><a href="#">Accessories</a></li>
									<li><a href="#">Trends</a></li>
								</ul>
							</div>
						</div>

						<div class="single_sidebar popular_post">
							<h3 class="sdbr_title">popular post</h3>
							<div class="sdbr_inner">
								<div class="single_popular_post fix">
									<a href="#" class="spp_img"><img src="<?php echo base_url(); ?>assets_home/img/sidebar/1.jpg" alt="" /></a>
									<div class="spp_text fix">
										<a href="#">Lorem Ipsum is simply 2018.</a>
										<p>Posted By John Doe</p>
									</div>
								</div>
								<div class="single_popular_post fix">
									<a href="#" class="spp_img"><img src="<?php echo base_url(); ?>assets_home/img/sidebar/2.jpg" alt="" /></a>
									<div class="spp_text fix">
										<a href="#">Lorem Ipsum is simply 2018.</a>
										<p>Posted By John Doe</p>
									</div>
								</div>
								<div class="single_popular_post fix">
									<a href="#" class="spp_img"><img src="<?php echo base_url(); ?>assets_home/img/sidebar/3.jpg" alt="" /></a>
									<div class="spp_text fix">
										<a href="#">Lorem Ipsum is simply 2018.</a>
										<p>Posted By John Doe</p>
									</div>
								</div>
							</div>
						</div>
											
						<div class="single_sidebar tags fix">
							<h3 class="sdbr_title">tags</h3>
							<div class="sdbr_inner">
								<a href="#">App</a>
								<a href="#">Fashiondary</a>
								<a href="#">Fashion Tag</a>
								<a href="#">Logo Designer</a>
								<a href="#">Populat Tees</a>
								<a href="#">Designer</a>
								<a href="#">Most Recent</a>
							</div>
						</div> -->
			</div>

		</div>
	</div>
</div>