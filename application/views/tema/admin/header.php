<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title><?php echo $title; ?> - Trashcan</title>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets_admin/images/fav.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/lineicons/lineicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/jquery.datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/flatweather.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/color.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/responsive.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="panel-layout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-page">
                        <header>
                            <div class="side-menus">
                                <div class="side-header">
                                    <div class="logo"><a title="" href="index.html"><img alt="" src="<?php echo base_url(); ?>assets_admin/images/logo-dash-admin.png"></a></div>
                                    <nav class="slide-menu">
                                        <!-- <span>Navigation <i class="ti-layout"></i></span> -->
                                        <ul class="parent-menu">
                                            <li class="active"> <a href="<?php echo base_url(); ?>admin" title="Home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                            </li>
                                            <li class="menu-item-has-children"> <a title=""><i class="fa fa-laptop"></i><span>Produk</span></a>
                                                <ul class="mega">
                                                    <li><a href="<?php echo base_url(); ?>admin/produksampah">Produk</a></li>
                                                    <li><a href="<?php echo base_url(); ?>admin/kategoriproduk">Kategori</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>admin/pembelian"><i class="fa fa-shopping-cart"></i><span>Transaksi</span></a>
                                            </li>
                                            <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'subsoal' ?  'active' : '' ?>">
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>admin/member"><i class="fa fa-users"></i><span>Pelanggan</span></a>
                                            <!-- <li><a href="<?php echo base_url(); ?>admin/pesan"><i class="fa fa-users"></i><span>Pesan</span></a> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </header>
                        <!-- side header -->
                        <div class="topbar">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <!-- <h2>Admin</h2> -->
                                        <div class="logo">
                                            <h2>Administrator</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <ul class="notify-area">
                                            <li>
                                                <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                                                <i class="fa fa-navicon nav-icon3"></i>
                                            </li>
                                            <li class="notifications"><a href="#" title=""><i class="fa fa-bell-o"></i></a><span class="red-bg"><?php echo count($notifikasi); ?></span>
                                                <div class="drop notify"> <span class="drop-head">Notifikasi</span>
                                                    <ul class="drop-meta">
                                                        <?php foreach ($notifikasi as $notif) : ?>
                                                            <a href="<?php echo base_url(); ?>admin/baca_notif/<?php echo $notif['notif_id']; ?>">
                                                                <li> <i class="notifi-icon blue"><?php echo substr($notif['notif_dari'], 0, 1); ?></i>
                                                                    <div class="notifi-meta">
                                                                        <h4><a href="<?php echo base_url(); ?>admin/baca_notif/<?php echo $notif['notif_id']; ?>"><?php echo $notif['notif_dari']; ?></a></h4>
                                                                        <span><?php echo $notif['notif_perihal']; ?></span><br>
                                                                        <span><?php echo date('d-m-Y H:i', strtotime($notif['notif_time'])); ?> <?php echo date('A', strtotime($notif['notif_time'])); ?></span>
                                                                    </div>
                                                                </li>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    <!-- <span class="drop-bottom"><a href="#" title="">View More Notifications</a></span> -->
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="user-head">
                                            <div class="admin">
                                                <div class="admin-avatar"><img src="https://www.kindpng.com/picc/m/699-6997452_administrator-network-icons-system-avatar-computer-transparent-admin.png" width="40" height="40"> <i class="online"></i> </div>
                                            </div>
                                            <div class="drop setting"> <span class="drop-head"><?php echo $this->session->userdata('adminnama'); ?> <i></i></span>
                                                <ul class="drop-meta">
                                                    <li> <a href="<?php echo base_url(); ?>admin/edit_profil"><i class="fa fa-eyedropper"></i>Edit Profile</a> </li>
                                                    <li> <a href="<?php echo base_url(); ?>admin/edit_sandi"><i class="fa fa-lock"></i>Ganti Password</a> </li>
                                                    <li> <a href="<?php echo base_url(); ?>laporan/transaksi"><i class="fa fa-align-right"></i>Laporan Transaksi</a> </li>
                                                </ul>
                                                <span class="drop-bottom"><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i>Keluar</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="responsive-header">
                                <div class="logo-area">
                                    <ul class="notify-area">
                                        <li>
                                            <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                                        </li>
                                        <li class="notifications"><a href="#" title=""><i class="fa fa-bell-o"></i></a><span class="red-bg"><?php echo count($notifikasi); ?></span>
                                            <div class="drop notify"> <span class="drop-head">Notifikasi</span>
                                                <ul class="drop-meta">
                                                    <?php foreach ($notifikasi as $notif) : ?>
                                                        <a href="<?php echo base_url(); ?>admin/baca_notif/<?php echo $notif['notif_id']; ?>">
                                                            <li> <i class="notifi-icon blue"><?php echo substr($notif['notif_dari'], 0, 1); ?></i>
                                                                <div class="notifi-meta">
                                                                    <h4><a href="<?php echo base_url(); ?>admin/baca_notif/<?php echo $notif['notif_id']; ?>"><?php echo $notif['notif_dari']; ?></a></h4>
                                                                    <span><?php echo $notif['notif_perihal']; ?></span><br>
                                                                    <span><?php echo date('d-m-Y H:i', strtotime($notif['notif_time'])); ?> <?php echo date('A', strtotime($notif['notif_time'])); ?></span>
                                                                </div>
                                                            </li>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <!-- <span class="drop-bottom"><a href="#" title="">View More Notifications</a></span> </div> -->
                                        </li>
                                        <li class="messages"><a href="#" title=""><i class="fa fa-envelope-o"></i></a><span class="blue-bg"><?php echo count($pesanmasuk); ?></span>
                                            <div class="drop messages"> <span class="drop-head"><?php echo count($pesanmasuk); ?> Pesan Baru <i class="fa fa-pencil-square-o"></i></span>
                                                <ul class="drop-meta">
                                                    <?php foreach ($pesanmasuk as $notif) : ?>
                                                        <a href="<?php echo base_url(); ?>admin/baca_pesan/<?php echo $notif['notif_id']; ?>">
                                                            <li> <i class="notifi-icon"><?php echo substr($notif['notif_dari'], 0, 1); ?></i>
                                                                <div class="notifi-meta"> <span><?php echo date('d-m-Y H:i', strtotime($notif['notif_time'])); ?> <?php echo date('A', strtotime($notif['notif_time'])); ?></span>
                                                                    <h4><a href="<?php echo base_url(); ?>admin/baca_pesan/<?php echo $notif['notif_id']; ?>" title="<?php echo $notif['notif_perihal']; ?> dari <?php echo $notif['notif_dari']; ?>"><?php echo $notif['notif_perihal']; ?></a></h4>
                                                                </div>
                                                            </li>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <!-- <span class="drop-bottom"><a href="#" title="">View More messages</a></span> </div> -->
                                        </li>
                                    </ul>

                                    <div class="user-head">
                                        <div class="admin">
                                            <div class="admin-avatar"> <img src="<?php echo base_url(); ?>assets_admin/images/resources/<?php echo $this->session->userdata('adminfoto'); ?>"> <i class="online"></i> </div>
                                        </div>
                                        <div class="drop setting"> <span class="drop-head"><?php echo $this->session->userdata('adminnama'); ?> <i></i></span>
                                            <ul class="drop-meta">
                                                <li> <a href="<?php echo base_url(); ?>admin/edit_profil"><i class="fa fa-eyedropper"></i>Edit Profile</a> </li>
                                                <li> <a href="<?php echo base_url(); ?>admin/pesan"><i class="fa fa-envelope-o"></i>Pesan</a> </li>
                                                <li> <a href="<?php echo base_url(); ?>admin/edit_sandi"><i class="fa fa-lock"></i>Ganti Password</a> </li>
                                                <li> <a href="<?php echo base_url(); ?>laporan/transaksi"><i class="fa fa-align-right"></i>Laporan Transaksi</a> </li>
                                            </ul>
                                            <span class="drop-bottom"><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i>Keluar</a></span>
                                        </div>
                                    </div>
                                    <!-- <ul class="seting-area">
                                    <li class="langages">
                                        <a title="" href="#">Eng</a>
                                        <ul class="drop language">
                                            <li class="lang-selected"><a href=""><i class="fa fa-check"></i> Eng</a></li>
                                            <li><a href="">Rus</a></li>
                                            <li><a href="">Jap</a></li>
                                            <li><a href="">Arb</a></li>
                                        </ul>
                                    </li>
                                    <li class="setting-panel"><a title="" href="#"><i class="icon-equalizer"></i></a></li>
                                </ul> -->
                                </div>
                                <div class="t-search">
                                    <form method="post">
                                        <input type="text" placeholder="Enter Your Keyword">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- responsive header -->
                            <div class="panel-body">
                                <div class="content-area">
                                    <div class="sub-bar">
                                        <div class="sub-title">
                                            <h4><?php echo $title; ?>:</h4>
<br>
                                        </div>
                                        <ul class="bread-crumb">
                                            <li><a href="<?php echo base_url(); ?>admin" title="">Home</a></li>
                                            <li><?php echo $title; ?></li>
                                        </ul>
                                    </div>
