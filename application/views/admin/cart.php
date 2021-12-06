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
		<div class="row">
			<div class="col-sm-12">
				<div class="cart_table_area table-responsive">
					<form action="<?php echo base_url(); ?>cart/update" method="post" enctype="multipart/form-data">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<table class="table cart_prdct_table text-center">
							<thead>
								<tr>
									<th class="cpt_no">No.</th>
									<th class="cpt_img">Foto Produk</th>
									<th class="cpt_pn">Nama</th>
									<th class="cpt_pn">Sisa Stok Produk</th>
									<th class="cpt_q">Jumlah</th>
									<th class="cpt_p">Harga</th>
									<th class="cpt_t">Total</th>
									<th class="cpt_r">Hapus</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($keranjang as $cart) : ?>
									<tr>
										<td><span class="cp_no"><?php echo $i; ?></span></td>
										<td><a href="<?php echo base_url(); ?>assets_home/img/product/<?php echo $cart['image']; ?>" class="cp_img"><img src="<?php echo base_url(); ?>assets_home/img/product/<?php echo $cart['image']; ?>" alt="" /></a></td>
										<td><a href="#" class="cp_title"><?php echo $cart['name'] ?></a></td>
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][id]" value="<?php echo $cart['id']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][rowid]" value="<?php echo $cart['rowid']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][name]" value="<?php echo $cart['name']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][image]" value="<?php echo $cart['image']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][weight]" value="<?php echo $cart['weight']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][price]" value="<?php echo $cart['price']; ?>" />
										<input type="hidden" name="cart[<?php echo $cart['id']; ?>][qty]" value="<?php echo $cart['qty']; ?>" />
										<td>
											<?php $produk = $this->Admin_model->produkbyid($cart['id']); ?>
											<?php
											$this->db->select('*, sum(d_transaksi_qty) as jumlah');
											$this->db->from('tb_transaksi');
											$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
											$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
											$this->db->where('transaksi_status', 'diproses');
											$this->db->where('d_transaksi_item', $cart['id']);
											$stokterjual = $this->db->get()->row_array();
											?>
											<?= $produk['stok'] - $stokterjual['jumlah']; ?>
										</td>
										<td>
											<div class="cp_quntty">
												<input name="cart[<?php echo $cart['id']; ?>][qty]" value="<?php echo $cart['qty']; ?>" max="<?php echo $cart['stok'] - $stokterjual['jumlah']; ?>" type="number">
											</div>
										</td>
										<td>
											<p class="cp_price"><?php echo number_format($cart['price'], 0, ',', '.'); ?></p>
										</td>
										<td>
											<p class="cpp_total"><?php echo number_format($cart['subtotal'], 0, ',', '.'); ?></p>
										</td>
										<td><a href="<?php echo base_url(); ?>cart/delete/<?php echo $cart['rowid']; ?>" class="btn btn-default cp_remove"><i class="fa fa-trash"></i></a></td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-xs-12 cart-actions cart-button-cuppon">
				<div class="row">
					<div class="col-sm-7">
						<div class="cart-action">
							<a href="<?php echo base_url(); ?>" class="btn border-btn">Lanjut Belanja</a>
							<button type="submit" class="btn border-btn">Update Keranjang</button>
						</div>
					</div>
					</form>
					<div class="col-sm-5">
						<div class="cuppon-wrap">
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-xs-12 cart-checkout-process text-right">
				<div class="wrap">
					<h4><span>Subtotal : Rp. </span><span><?php echo number_format($this->cart->total(), 0, ',', '.'); ?></span></h4>
					<a href="<?php echo base_url(); ?>checkout" class="btn border-btn">Bayar Sekarang</a>
				</div>
			</div>

		</div>
	</div>
</div>