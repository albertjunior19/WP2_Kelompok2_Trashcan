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
					<li><span><?php echo $detail['nama_produk']; ?></span></li>
				</ul>
			</div>



		</div>
	</div>
</div>

<!-- Product Details Area  -->
<div class="prdct_dtls_page_area">
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
	<div class="container">
		<div class="row">
			<!-- Product Details Image -->
			<div class="col-md-5 col-xs-12">
				<div class="pd_img fix">
					<a class="venobox" title="Klik untuk melihat lebih detail" href="<?php echo base_url(); ?>assets_home/img/product/<?php echo $detail['gambar']; ?>"><img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $detail['gambar']; ?>" alt="<?php echo $detail['nama_produk']; ?>" /></a>
				</div>
			</div>
			<!-- Product Details Content -->
			<div class="col-md-7 col-xs-12">
				<div class="prdct_dtls_content">
					<a class="pd_title" href="#"><?php echo $detail['nama_produk']; ?></a>
					<div class="pd_price_dtls fix">
						<!-- Product Price -->
						<div class="pd_price">
							<span class="new">Rp. <?php echo number_format($detail['harga'], 0, ',', '.'); ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Bentuk :</h3>
								<br>
								<p><?php echo $detail['bentuk']; ?></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Komposisi :</h3>
								<br>
								<p><?php echo $detail['komposisi']; ?></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Cara Pakai :</h3>
								<br>
								<p><?php echo $detail['carapakai']; ?></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Dosis :</h3>
								<br>
								<p><?php echo $detail['dosis']; ?></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Indikasi :</h3>
								<br>
								<p><?php echo $detail['indikasi']; ?></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pd_text">
								<h3>Kadaluarsa :</h3>
								<br>
								<p><?php echo $detail['kadaluarsa']; ?></p>
							</div>
						</div>
					</div>
				</div>
				<form action="<?php echo base_url(); ?>cart/add_cart" method="post">
					<div class="form-group">
						<label>Jumlah : </label>
						<br>
						<div class="pd_qty fix">
							<input value="1" name="qttybutton" min="1" max="<?php echo $detail['stok']; ?>" class="cart-plus-minus-box" type="number">
							<input type="hidden" name="produkid" value="<?php echo $detail['produk_id']; ?>">
						</div>
					</div>
					<div class="pd_btn fix">
						<button type="submit" class="btn btn-default acc_btn">Tambah Ke Keranjang</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</div>