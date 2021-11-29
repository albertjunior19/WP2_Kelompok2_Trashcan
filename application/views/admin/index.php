<div class="row">
  <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="top-widget">
      <i class="fa fa-tasks"></i>
      <div class="informative">
        <span><?php echo $totalproduk; ?></span>
        <em>Total Produk</em>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="top-widget">
      <i class="fa fa-users"></i>
      <div class="informative">
        <span><?php echo $totaluser; ?></span>
        <em>Total Pelanggan</em>
      </div>
    </div>
  </div>
</div>
<!-- top info widgets -->
<div class="row">
  <div class="col-lg-12">
    <div class="widget">
      <div class="widget-title">
        <h4>Transaksi Terbaru</h4>
        <ul class="widget-controls">
          <li title="Refresh" class="refresh-content"><i class="fa fa-refresh"></i></li>
          <li title="Maximize" class="expand-content"><i class="icon-frame"></i></li>
          <li title="More Options" class="more-option"><i class="ti-more-alt"></i></li>
        </ul>

      </div>
      <div class="widget-peding">
        <div class="table-styles">
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <div class="widget">
            <table class="prj-tbl striped bordered table-responsive">
              <thead class="">
                <tr>
                  <th><em>No</em></th>
                  <th><em>Tgl</em></th>
                  <th><em>Dari</em></th>
                  <th><em>No HP</em></th>
                  <th><em>Total</em></th>
                  <th><em>Tujuan</em></th>
                  <th><em>Status</em></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $pro) : ?>
                  <tr>
                    <td><?php echo $i . '.'; ?></td>
                    <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></span></td>
                    <td><i><?php echo $pro['nama_lengkap']; ?></i></td>
                    <td><i><?php echo $pro['telepon']; ?></i></td>
                    <td><i>Rp. <?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></i></td>
                    <td><i><?php echo $pro['transaksi_tujuan']; ?></i></td>
                    <td><i><?php echo ucwords($pro['transaksi_status']); ?></i></td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- chart full -->