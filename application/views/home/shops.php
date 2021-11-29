<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $title; ?></h3>
			</div>

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><span><?php echo $title; ?></span></li>
				</ul>
			</div>



		</div>
	</div>
</div>


<!-- Shop Product Area -->
<div class="shop_page_area">
	<div class="container">
		<div class="shop_details text-center">
			<div class="row">
				<?php foreach ($produk as $prod) : ?>
					<div class="col-md-3 col-sm-6">
						<div class="single_product">
							<div class="product_image">
								<img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $prod['gambar']; ?>" alt="<?php echo $prod['nama_produk']; ?>" />
								<div class="box-content">
									<?php
									$this->db->select('*, sum(d_transaksi_qty) as jumlah');
									$this->db->from('tb_transaksi');
									$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
									$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
									$this->db->where('transaksi_status', 'diproses');
									$this->db->where('d_transaksi_item', $prod['produk_id']);
									$stokterjual = $this->db->get()->row_array();
									?>
									<?php if ($prod['stok'] - $stokterjual['jumlah'] <= '0') { ?>
									<?php } else { ?>
										<a href="<?php echo base_url(); ?>cart/add/<?php echo $prod['produk_id']; ?>"><i class="fa fa-cart-plus"></i></a>
									<?php } ?>
									<a href="<?php echo base_url(); ?>p/<?php echo $prod['produk_id']; ?>/<?php echo $prod['url']; ?>/<?php echo $prod['produk_url']; ?>"><i class="fa fa-search"></i></a>
								</div>
							</div>

							<div class="product_btm_text">
								<h4><a href="<?php echo base_url(); ?>p/<?php echo $prod['produk_id']; ?>/<?php echo $prod['url']; ?>/<?php echo $prod['produk_url']; ?>"><?php echo $prod['nama_produk']; ?></a></h4>
								<span class="price"><?php echo number_format($prod['harga'], 0, ',', '.'); ?></span>
								<br>
								<span>Stok : <?= $prod['stok'] - $stokterjual['jumlah']; ?></span>
							</div>
						</div>
					</div> <!-- End Col -->

				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>