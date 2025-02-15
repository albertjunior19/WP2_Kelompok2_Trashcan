<div class="invoice-pad">
  <?php $tr = $dtransaksi->row_array(); ?>
  <div class="gap no-gap">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="invoice-info">
          <h3>Subject: <span><?php echo $title; ?> </span></h3>
          <h4>invoice info</h4>
          <ul class="some-about">
            <li><span>Tanggal Pesan :</span><?php echo date('d-m-Y', strtotime($tr['transaksi_tgl_pesan'])); ?></li>
            <li><span>Tanggal terakhir Bayar:</span><?php echo date('d-m-Y', strtotime($tr['transaksi_bts_bayar'])); ?></li>
            <li><span>status:</span><i><?php echo ucwords($tr['transaksi_status']); ?></i></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="invoice-detail">
          <h4>Invoice No: <span>#<?php echo $tr['transaksi_id']; ?></span></h4>
          <h5><?php echo $tr['nama_lengkap']; ?></h5>
          <p><?php echo $tr['transaksi_tujuan']; ?>, <?php echo $tr['transaksi_kota']; ?>, <?php echo $tr['transaksi_pos']; ?></p>
          <ul class="some-about">
            <li><span>E-mail:</span><?php echo $tr['email']; ?></li>
            <li><span>No HP:</span><?php echo $tr['telepon']; ?></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="invoice-detail">
          <h4>Bukti Pembayaran</h4>
          <img width="100%" src="<?php echo base_url('assets_home/img/buktipembayaran/' . $tr['buktipembayaran']) ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="gap no-top">
    <div class="invoice-table">
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive">
          <thead class="drk">
            <tr>
              <th><em>No.</em></th>
              <th><em>Item</em></th>
              <th><em>Harga</em></th>
              <th><em>Quantity</em></th>
              <th><em>Subtotal</em></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php $ongkir = $tr['transaksi_total']; ?>
            <?php foreach ($dtransaksi->result_array() as $trs) : ?>
              <?php $ongkir = $tr['ongkir']; ?>
              <tr>
                <td><span><?php echo $i . '.'; ?></span></td>
                <td><i><?php echo $trs['nama_produk']; ?></i></td>
                <td><ins>Rp. <?php echo number_format($trs['harga'], 0, ',', '.'); ?></ins></td>
                <td><i><?php echo $trs['d_transaksi_qty']; ?></i></td>
                <td><i>Rp. <?php echo number_format($trs['d_transaksi_biaya'], 0, ',', '.'); ?></i></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
              <td colspan="4">Ongkos Kirim</td>
              <td colspan="4">Rp. <?php echo number_format($ongkir, 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <td colspan="4">Total</td>
              <td colspan="4">Rp. <?php echo number_format($trs['d_transaksi_biaya'] + $ongkir, 0, ',', '.'); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="gap no-gap">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <?php if ($trs['transaksi_status'] != 'Belum Mengupload Bukti Pembayaran') { ?>
          <form action="<?= base_url('admin/konfirmasi_transaksi') ?>" method="post">
            <div class="form-group">
              <label>Status Transaksi</label>
              <input type="hidden" name="idtransaksi" value="<?= $trs['transaksi_id'] ?>">
              <select class="form-control" name="transaksi_status">
                <option <?php if ($trs['transaksi_status'] == 'Sedang Di Kemas') echo 'selected'; ?> value="Sedang Di Kemas">Sedang Di Kemas</option>
                <option <?php if ($trs['transaksi_status'] == 'Dikirim') echo 'selected'; ?> value="Dikirim">Dikirim</option>
                <option <?php if ($trs['transaksi_status'] == 'Selesai') echo 'selected'; ?> value="Selesai">Selesai</option>
                <option <?php if ($trs['transaksi_status'] == 'Di Tolak') echo 'selected'; ?> value="Di Tolak">Di Tolak</option>
              </select>
            </div>
            <div class="form-group">
              <label>Masukkan Nomor Resi</label>
              <input type="text" class="form-control" value="<?= $trs['noresi'] ?>" name="noresi">
            </div>
            <div class="form-group">
              <button class="btn btn-primary float-right pull-right" type="submit">Simpan</button>
            </div>
          </form>
        <?php } ?>
      </div>
      <div class="col-md-3 col-sm-12">
        <?php if ($trs['transaksi_status'] != 'Belum Mengupload Bukti Pembayaran') { ?>
          <div class="proced-btns"> <a class="btn-st " href="<?php echo base_url(); ?>admin/cetak_invoice/<?php echo $trs['transaksi_id']; ?>" title="Cetak">print invoice</a>
          <?php } ?>
          <button class="btn-st drk-clr" onclick="goBack();" title="Back">Kembali</button>
          </div>
      </div>
    </div>
  </div>
</div>