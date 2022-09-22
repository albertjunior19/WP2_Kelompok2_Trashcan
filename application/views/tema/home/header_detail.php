<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Trashcan">
	<!-- Open Graph Meta-->
	<!-- <link rel="icon" href="<?php echo base_url(); ?>assets_beranda/favicon.ico"> -->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Trashcan">
	<meta property="og:title" content="<?php echo $title; ?> - Trashcan">
	<!-- <meta property="og:url" content="https://rumahquranalhuda.com/"> -->
	<!-- <meta property="og:image" content="<?php echo base_url(); ?>assets_beranda/img/thumb.jpeg"> -->
	<meta property="og:description" content="Trashcan">
	<title><?php echo $detail['nama_produk']; ?> - Trashcan</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/meanmenu.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/venobox.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/responsive.css" />
	<!--<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ja5OB_qGcqyvktue"></script>-->
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ciMmJn3Vn2cG2Kda"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>

	<!--  Preloader  -->

	<div class="preloader">
		<div class="status-mes">
			<div class="bigSqr">
				<div class="square first"></div>
				<div class="square second"></div>
				<div class="square third"></div>
				<div class="square fourth"></div>
			</div>
			<div class="text_loading text-center">loading</div>
		</div>
	</div>

	<!--  Start Header  -->
	<header id="header_area">
		<div class="header_top_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="hdr_tp_left">
							<!--<div class="call_area">-->
							<!--	<span class="single_con_add"><i class="fa fa-phone"></i> <?php echo $profil['profil_telp']; ?></span>-->
							<!--	<span class="single_con_add"><i class="fa fa-envelope"></i> <?php echo $profil['profil_email']; ?></span>-->
							<!--</div>-->
						</div>
					</div>

					<div class="col-xs-12 col-sm-6">
						<ul class="hdr_tp_right text-right">
							<?php if ($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') { ?>
								<li class="lan_area"><a href="#"><i class="fa fa-user"></i> Akun Saya <i class="fa fa-caret-down"></i></a>
									<ul class="csub-menu">
										<li><a href="<?php echo base_url(); ?>account">Masuk</a></li>
									</ul>
								</li>
							<?php } else { ?>
								<li class="lan_area"><a href="#"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username'); ?> <i class="fa fa-caret-down"></i></a>
									<ul class="csub-menu">
										<li><a href="<?php echo base_url(); ?>user">Dashboard</a></li>

										<li><a href="<?php echo base_url(); ?>user/transaksi">Riwayat Transaksi</a></li>
										<li><a href="<?php echo base_url(); ?>home/trashpickriwayat">Riwayat Trashpick</a></li>
										<li><a href="<?php echo base_url(); ?>user/profil">Profil</a></li>
										<li><a href="<?php echo base_url(); ?>user/ganti_password">Ganti Sandi</a></li>
										<li><a href="<?php echo base_url(); ?>logout">Keluar</a></li>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div> <!--  HEADER START  -->

		<div class="header_btm_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3">
						<img width="75px" src="<?= base_url('assets_home/logo.png') ?>">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 text-right">
						<div class="menu_wrap">
							<div class="main-menu">
								<nav>
									<ul>
										<li><a href="<?php echo base_url(); ?>">Home</a>
										</li>
										<li><a href="<?php echo base_url(); ?>shops">TrashMarket</a></li>
										<li><a href="<?php echo base_url('home/trashpicktambah'); ?>">Trashpick</a></li>
										<!-- <li><a href="#">Kategori <i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu">
												<?php foreach ($kategori as $tag) : ?>
													<li><a href="<?php echo base_url(); ?>kategori/<?php echo $tag['url'] ?>"><?php echo $tag['kategori'] ?></a></li>
												<?php endforeach; ?>
											</ul>
										</li> -->
									</ul>
								</nav>
							</div> <!--  End Main Menu -->

							<div class="mobile-menu text-right ">
								<nav>
									<ul>
										<li><a href="<?php echo base_url(); ?>">Home</a></li>
										<li><a href="<?php echo base_url(); ?>shops">Produk</a></li>
										<li><a href="<?php echo base_url(); ?>trashpicktambah">Transpick</a></li>
										<!-- <li><a href="#">Kategori</a>
											<ul>
												<?php foreach ($kategori as $tag) : ?>
													<li><a href="<?php echo $tag['url'] ?>"><?php echo $tag['kategori'] ?></a></li>
												<?php endforeach; ?>
											</ul>
										</li> -->
										<li><a href="<?php echo base_url(); ?>kontak">Kontak</a></li>
									</ul>
								</nav>
							</div> <!--  End mobile-menu -->

							<div class="right_menu">
								<ul class="nav justify-content-end">
									<li>
										<div class="search_icon">
											<i class="fa fa-search search_btn" aria-hidden="true"></i>
											<div class="search-box">
												<form action="<?php echo base_url(); ?>cari" method="post">
													<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
													<div class="input-group">
														<input type="text" name="key" class="form-control" placeholder="Cari Produk" />
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</div>
												</form>
											</div>
										</div>
									</li>

									<li>
										<div class="cart_menu_area">
											<div class="cart_icon">
												<a href="#"><i class="fa fa-shopping-bag " aria-hidden="true"></i></a>
												<span class="cart_number"><?php echo count($keranjang); ?></span>
											</div>


											<!-- Mini Cart Wrapper -->
											<div class="mini-cart-wrapper">
												<!-- Product List -->
												<div class="mc-pro-list fix">
													<?php foreach ($keranjang as $cart) : ?>
														<div class="mc-sin-pro fix">
															<a href="#" class="mc-pro-image float-left"><img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $cart['image']; ?>" alt="<?php echo $cart['name']; ?>" width="49" height="64" /></a>
															<div class="mc-pro-details fix">
																<a href="#"><?php echo $cart['name']; ?></a>
																<span><?php echo $cart['qty']; ?>x<?php echo number_format($cart['price'], 0, ',', '.'); ?></span>
																<a class="pro-del" href="<?php echo base_url(); ?>cart/delete/<?php echo $cart['rowid']; ?>"><i class="fa fa-times-circle"></i></a>
															</div>
														</div>
													<?php endforeach; ?>
												</div>
												<!-- Sub Total -->
												<div class="mc-subtotal fix">
													<h4>Subtotal <span><?php echo number_format($this->cart->total(), 0, ',', '.'); ?></span></h4>
												</div>
												<!-- Cart Button -->
												<div class="mc-button">
													<a href="<?php echo base_url(); ?>checkout" class="checkout_btn">checkout</a>
												</div>
											</div>
										</div>

									</li>
								</ul>
							</div>
						</div>
					</div><!--  End Col -->
				</div>
			</div>
		</div>
	</header>
	<!--  End Header  -->