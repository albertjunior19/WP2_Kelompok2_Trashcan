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

<section class="checkout_page">
    <div class="container">
        <form class="checkout_form" action="<?= base_url('home/trashpicktambah') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h3>Trashpick</h3>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <label for="address">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('username') ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="address">No. Telp</label>
                        <input type="text" name="notelp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat Lengkap:</label>
                        <textarea rows="3" name="alamat" id="address" placeholder="Alamat Lengkap" class="form-control"></textarea>
                        <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="address">Jenis Barang</label>
                        <select name="jenisbarang" class="form-control" required>
                            <option value="Botol">Botol</option>
                            <option value="Plastik">Plastik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Berat</label>
                        <input type="number" name="berat" class="form-control" placeholder="Kg" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        <h3>Rincian Belanja</h3>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="city">Tanggal Pickup :</label>
                            <input type="date" name="tanggalpickup" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="city">Waktu Pickup :</label>
                            <input type="time" name="waktupickup" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Biaya Pick-up</label>
                        <input type="text" name="biayapickup" class="form-control" value="Rp. 6000,- (Se-jakarta Pusat)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control" value="Rp. 6000,- (Se-jakarta Pusat)" required>
                    </div>
                    <div class="qc-button">
                        <button type="submit" class="btn border-btn" tabindex="0">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>