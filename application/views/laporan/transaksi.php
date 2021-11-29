<div class="gap inner-bg">
  <div class="element-title">
    <h4><?php echo $title; ?></h4>

    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
      <form action="<?php echo base_url(); ?>laporan/lihat_transaksi" method="post">
        <br>
        <div class="row">
          <div class="col-md-5">
            <label>Mulai</label>
            <input type="date" name="start" value="<?php echo $start; ?>" class="form-control" required="">
          </div>
          <div class="col-md-5">
            <label>Sampai</label>
            <input type="date" name="end" value="<?php echo $end; ?>" class="form-control" required="">
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary mt-4">Lihat</button>
          </div>
        </div>
      </form>
      <?php if ($start == '') { ?>
        <br>
        <a href="<?php echo base_url(); ?>laporan/pdf_trx" target="_blank" class="btn-st rd-clr"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>
      <?php } else { ?>
        <br>
        <a href="<?php echo base_url(); ?>laporan/pdf_transaksi/<?php echo $start; ?>/<?php echo $end; ?>" target="_blank" class="btn-st rd-clr"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>
      <?php } ?>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>Tgl Pesan</em></th>
              <th><em>Jatuh Tempo</em></th>
              <th><em>Pelanggan</em></th>
              <th><em>No HP</em></th>
              <th><em>Total</em></th>
              <th><em>Tujuan</em></th>
              <th><em>Status</em></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php $pendapatan = 0; ?>
            <?php foreach ($transaksi as $pro) : ?>
              <?php $pendapatan += $pro['transaksi_total']; ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                <td><span><?php echo date('d-m-Y', strtotime($pro['transaksi_bts_bayar'])); ?></span></td>
                <td><i><?php echo $pro['nama_lengkap']; ?></i></td>
                <td><i><?php echo $pro['telepon']; ?></i></td>
                <td><i>Rp. <?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></i></td>
                <td><i><?php echo $pro['transaksi_tujuan']; ?></i></td>
                <td><i><?php echo ucwords($pro['transaksi_status']); ?></i></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
              <thead>
                <th colspan="6"></th>
                <th><em>Pendapatan</em></th>
                <th><em>Rp. <?php echo number_format($pendapatan, 0, ',', '.'); ?></em></th>
              </thead>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>