<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
        <div class="add-prod-from">
          <div class="row">
            <div class="col-md-6">
              <label>Nama Produk</label>
              <input type="text" name="nama-produk" value="<?php echo set_value('nama-produk'); ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('nama-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Harga Produk</label>
              <input type="text" name="harga-produk" value="<?php echo set_value('harga-produk'); ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('harga-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Stok</label>
              <input type="text" name="stok-produk" value="<?php echo set_value('stok-produk'); ?>" placeholder="">
              <small class="text-danger"><?php echo form_error('stok-produk'); ?></small>
            </div>
            <div class="col-md-6">
              <label>Berat produk dalam satuan gram</label>
              <input type="text" name="berat-produk" value="<?php echo set_value('berat-produk'); ?>">
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
              <input type="text" name="namamitra" value="<?php echo set_value('namamitra'); ?>" placeholder="">
            </div>
            <div class="col-md-12"> <span class="upload-image">Upload gambar</span>
              <label class="fileContainer"> <span>upload</span>
                <input type="file" name="gambar" />
              </label>
            </div>
            <div class="col-md-12">
              <div class="buttonz">
                <button type="submit">Simpan</button>
                <button type="button" onclick="goBack()">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>