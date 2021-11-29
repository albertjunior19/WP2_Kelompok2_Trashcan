<!-- Start product Area -->
		<section id="product_area" class="section_padding">
			<div class="container">		
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="section_title">						
							<h2>Produk <span>Kami</span></h2>
							<div class="divider"></div>							
						</div>
					</div>
				</div>
			
				<div class="text-center">
					<div class="product_item">
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
		</section>
		<!-- End product Area -->