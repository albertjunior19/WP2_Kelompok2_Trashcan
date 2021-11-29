<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $produkid['produk_id']; ?>">
        <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
        <div class="add-prod-from">
          <div class="row">
            <div class="col-md-12">
              <label>Nama Produk</label>
              <input type="text" name="nama-produk" value="<?php echo $produkid['nama_produk']; ?>" placeholder="" readonly>
              <small class="text-danger"><?php echo form_error('nama-produk'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Harga Produk</label>
              <input type="text" name="harga-produk" value="<?php echo $produkid['harga']; ?>" placeholder="" readonly>
              <small class="text-danger"><?php echo form_error('harga-produk'); ?></small>
            </div>
            <?php
            $this->db->select('*, sum(d_transaksi_qty) as jumlah');
            $this->db->from('tb_transaksi');
            $this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
            $this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
            $this->db->where('transaksi_status', 'diproses');
            $this->db->where('d_transaksi_item', $produkid['produk_id']);
            $stokterjual = $this->db->get()->row_array();
            ?>
            <div class="col-md-12">
              <label>Stok Awal</label>
              <input type="hidden" name="stoklama" value="<?php echo $produkid['stok']; ?>" placeholder="" readonly>
              <input type="text" name="stok-produk" value="<?php echo $produkid['stok'] - $stokterjual['jumlah']; ?>" placeholder="" readonly>
              <small class="text-danger"><?php echo form_error('stok-produk'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Tambah Stok</label>
              <input type="text" name="stokbaru" placeholder="Masukkan Jumlah Stok Baru" required>
              <small class="text-danger"><?php echo form_error('stokbaru'); ?></small>
            </div>
            <div class="col-md-12">
              <div class="buttonz">
                <button type="submit">Simpan</button>
                <button onclick="goBack()">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>