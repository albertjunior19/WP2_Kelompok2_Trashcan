<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<?php $tr = $dtransaksi->row_array(); ?>
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3><?php echo $title; ?> <?php echo $tr['transaksi_id']; ?></h3>
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
		<div class="cart-actions cart-button-cuppon">
			<div class="cuppon-wrap text-center">
				<h3>No Transaksi <?php echo $tr['transaksi_id']; ?></h3>
				<br><br>
				<div class="row">
					<div class="col-md-6 text-left">
						<tr>
							<th>Nama : <?php echo $tr['nama_lengkap']; ?></th><br>
							<th>Email : <?php echo $tr['email']; ?></th><br>
							<th>Alamat : <?php echo $tr['transaksi_tujuan']; ?></th>
						</tr>
					</div>
					<div class="col-md-6 text-left">
						<tr>
							<th>Tujuan : <?php echo $tr['transaksi_kota']; ?>, <?php echo $tr['transaksi_pos']; ?></th><br>
							<th>Batas Bayar : <?php echo date('d-m-Y', strtotime($tr['transaksi_bts_bayar'])); ?></th>
						</tr>
					</div>
				</div>
				<div class="table-responsive mt-5">
					<table class="table table-sm table-bordered">
						<thead>
							<tr>
								<th scope="col">Nama Item</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php $ongkir = $tr['transaksi_total']; ?>
							<?php foreach ($dtransaksi->result_array() as $trs) : ?>
								<?php $ongkir = $tr['ongkir']; ?>
								<tr class="text-left">
									<td><?php echo $trs['nama_produk']; ?></td>
									<td><?php echo $trs['d_transaksi_qty']; ?></td>
									<td>Rp. <?php echo number_format($trs['d_transaksi_biaya'], 0, ',', '.'); ?></td>
								</tr>
							<?php endforeach; ?>
							<tr class="text-left">
								<td colspan="2">Ongkos Kirim</td>
								<td colspan="2">Rp. <?php echo number_format($ongkir, 0, ',', '.'); ?></td>
							</tr>
							<tr class="text-left">
								<td colspan="2">Total</td>
								<td colspan="2">Rp. <?php echo number_format($trs['d_transaksi_biaya'] + $ongkir, 0, ',', '.'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-6 text-left">
						<form action="<?php echo site_url('user/buktipembayaran/') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="buktipembayaran" class="form-control">Bukti Pembayaran</label>
								<input type="hidden" name="id" value="<?php echo $tr['transaksi_id'] ?>" class="form-control" required>
								<input type="file" name="gambar" class="form-control" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn border-btn">Simpan</button>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<?php if (!empty($tr['buktipembayaran'])) { ?>
							<img width="100%" src="<?php echo base_url('assets_home/img/buktipembayaran/' . $tr['buktipembayaran']) ?>">
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>