<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $produkid['produk_id']; ?>">
        <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
        <div class="add-prod-from">
          <div class="row">
            <div class="col-md-6">
              <label>Nama Produk</label>
              <input type="text" name="nama-produk" value="<?php echo $produkid['nama_produk']; ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('nama-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Harga Produk</label>
              <input type="text" name="harga-produk" value="<?php echo $produkid['harga']; ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('harga-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Stok</label>
              <?php
              $this->db->select('*, sum(d_transaksi_qty) as jumlah');
              $this->db->from('tb_transaksi');
              $this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
              $this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
              $this->db->where('transaksi_status', 'diproses');
              $this->db->where('d_transaksi_item', $produkid['produk_id']);
              $stokterjual = $this->db->get()->row_array();
              ?>
              <input type="text" name="stok-produk" value="<?php echo $produkid['stok'] - $stokterjual['jumlah']; ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('stok-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Berat produk dalam satuan gram</label>
              <input type="text" name="berat-produk" value="<?php echo $produkid['produk_weight']; ?>">
              <small class="text-danger"><?php echo form_error('berat-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Kategori</label><br>
              <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($kat as $k) : ?>
                  <option value="<?php echo $k['id_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label>Nama Mitra</label><br>
              <input type="text" name="namamitra" value="<?php echo $produkid['namamitra']; ?>" required>
            </div>
            <div class=" col-md-12"> <span class="upload-image">Upload Gambar</span>
              <label class="fileContainer"> <span>upload</span>
                <input type="file" name="gambar" />
                <input type="hidden" name="gambar_old" value="<?php echo $produkid['gambar']; ?>">
              </label>
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