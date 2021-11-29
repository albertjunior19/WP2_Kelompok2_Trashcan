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
            <div class="col-md-12">
              <label>Berat produk dalam satuan gram</label>
              <input type="text" name="berat-produk" value="<?php echo $produkid['produk_weight']; ?>">
              <small class="text-danger"><?php echo form_error('berat-produk'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Kadaluarsa Produk</label>
              <input type="date" class="form-control" name="kadaluarsa" value="<?php echo $produkid['kadaluarsa']; ?>">
              <small class="text-danger"><?php echo form_error('kadaluarsa'); ?></small>
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
              <label>Bentuk</label><br>
              <select name="bentuk" class="form-control" required>
                <option value="">Pilih Bentuk</option>
                <option value="Cair">Cair</option>
                <option value="Padat">Padat</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Indikasi</label>
              <textarea cols="30" name="indikasi" rows="5" placeholder="" value="<?php echo $produkid['indikasi']; ?>"><?php echo $produkid['indikasi']; ?></textarea>
              <small class="text-danger"><?php echo form_error('indikasi'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Dosis</label>
              <textarea cols="30" name="dosis" rows="5" placeholder="" value="<?php echo $produkid['dosis']; ?>"><?php echo $produkid['dosis']; ?></textarea>
              <small class="text-danger"><?php echo form_error('dosis'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Komposisi</label>
              <textarea cols="30" name="komposisi" rows="5" placeholder="" value="<?php echo $produkid['komposisi']; ?>"><?php echo $produkid['komposisi']; ?></textarea>
              <small class="text-danger"><?php echo form_error('komposisi'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Cara Pakai</label>
              <textarea cols="30" name="carapakai" rows="5" placeholder="" value="<?php echo $produkid['carapakai']; ?>"><?php echo $produkid['carapakai']; ?></textarea>
              <small class="text-danger"><?php echo form_error('carapakai'); ?></small>
            </div>
            <div class="col-md-12"> <span class="upload-image">Upload Gambar</span>
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