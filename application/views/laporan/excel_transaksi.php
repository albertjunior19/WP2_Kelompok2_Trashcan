<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>No Transaksi</th>
      <th>Tgl Pesan</th>
      <th>Kadaluwarsa</th>
      <th>Dari</th>
      <th>Total</th>
      <th>Tujuan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 1; ?>
    <?php $pendapatan = 0; ?>
    <?php foreach($transaksi as $pro): ?>
      <?php $pendapatan += $pro['transaksi_total']; ?>
      <tr>
        <td><?php echo $i.'.'; ?></td>
        <td><?php echo $pro['transaksi_id']; ?></td>
        <td><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></td>
        <td><?php echo date('d-m-Y', strtotime($pro['transaksi_bts_bayar'])); ?></td>
        <td><?php echo $pro['nama_lengkap']; ?></td>
        <td><?php echo number_format($pro['transaksi_total'],0,',','.'); ?></td>
        <td><?php echo $pro['transaksi_tujuan']; ?></td>
        <td><?php echo ucwords($pro['transaksi_status']); ?></td>
      </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <th>Pendapatan</th>
    <th colspan="7">Rp. <?php echo number_format($pendapatan,0,',','.'); ?></th>
  </tr>
  </tbody>
</table>