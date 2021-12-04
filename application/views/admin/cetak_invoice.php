<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 5px;
    }

    th {
      background-color: #4CAF50;
      font-weight: bold;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border: 1px solid grey;
    }

    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .responsive {
      width: 100%;
      height: auto;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body onload="printCetak()">

  <table width="625" style="border-color: white;">
    <tr>
      <td style="border-color: white;"><img src="<?= base_url('assets_home/logo.png') ?>" width="50" height="90"></td>
      <td style="border-color: white;">
        <font size="6"><B>Trashcan</B></font><br>
        <font size="2">Alamat : Jalan Karet Pasar Baru Barat II No.22 RT 06 RW 06 Kelurahan Karet Tengsin, Kecamatan Tanah Abang, Jakarta Pusat <br>Kode Pos 10220<br>Email : trashcan_jkt@gmail.com</font><br>
        </center>
      </td>
    </tr>
  </table>
  <h2 style="text-align: center;"><?php echo $title; ?></h2>
  <?php $tr = $dtransaksi->row_array(); ?>
  <div style="overflow-x:auto;">
    <tr>
      <th>Nomor Transaksi</th>
      <td>:</td>
      <td><?php echo $tr['transaksi_id']; ?></td>
    </tr><br>
    <tr>
      <th>Nama Pemesan</th>
      <td>:</td>
      <td><?php echo $tr['nama_lengkap']; ?></td>
    </tr><br>
    <tr>
      <th>Tanggal Pesan</th>
      <td>:</td>
      <td><?php echo date('d-m-Y', strtotime($tr['transaksi_tgl_pesan'])); ?></td>
    </tr><br>
    <tr>
      <th>Batas Pembayaran</th>
      <td>:</td>
      <td><?php echo date('d-m-Y', strtotime($tr['transaksi_bts_bayar'])); ?></td>
    </tr><br>
    <tr>
      <th>Status</th>
      <td>:</td>
      <td><?php echo ucwords($tr['transaksi_status']); ?></td>
    </tr><br>
    <tr>
      <th>Tujuan</th>
      <td>:</td>
      <td><?php echo $tr['transaksi_tujuan']; ?>, <?php echo $tr['transaksi_kota']; ?>, <?php echo $tr['transaksi_pos']; ?></td>
    </tr><br><br>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Item</th>
          <th>Harga Item</th>
          <th>Jumlah Item</th>
          <th>Biaya</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php $ongkir = $tr['transaksi_total'];
        $total = 0;
        ?>
        <?php foreach ($dtransaksi->result_array() as $trs) : ?>
          <?php
          $ongkir = $tr['ongkir'];
          $total += $trs['d_transaksi_biaya'];
          ?>
          <tr>
            <td><?php echo $i . '.'; ?></td>
            <td><?php echo $trs['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($trs['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $trs['d_transaksi_qty']; ?></td>
            <td>Rp. <?php echo number_format($trs['d_transaksi_biaya'], 0, ',', '.'); ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
      <tr>
        <td colspan="4">Ongkos Kirim</td>
        <td>Rp. <?php echo number_format($ongkir, 0, ',', '.'); ?></td>
      </tr>
      <tr>
        <td colspan="4">Total</td>
        <td>Rp. <?php echo number_format($total + $ongkir, 0, ',', '.'); ?></td>
      </tr>
    </table>
    <br><br>
    <div style="margin-left:500px">
      <tr>
        <th>Yang Mengesahkan</th>
      </tr>
    </div>
    <br><br><br><br><br>
    <div style="margin-left:510px">
      <tr>
        <th><?= $this->session->userdata('adminnama') ?></th>
      </tr>
    </div><br>
    <tr>
  </div>
  <script>
    function printCetak() {
      window.print();
    }
  </script>
</body>

</html>