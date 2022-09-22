<div class="gap inner-bg">
  <div class="element-title">
    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <a href="<?php echo base_url(); ?>admin/add_pelanggan" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
      <?php
      function waktu_lalu($timestamp)
      {
        $selisih = time() - strtotime($timestamp);
        $detik = $selisih;
        $menit = round($selisih / 60);
        $jam = round($selisih / 3600);
        $hari = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan = round($selisih / 2419200);
        $tahun = round($selisih / 29030400);
        if ($detik <= 60) {
          $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
          $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
          $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
          $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
          $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
          $waktu = $bulan . ' bulan yang lalu';
        } else {
          $waktu = $tahun . ' tahun yang lalu';
        }
        return $waktu;
      }
      ?>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive" id="myTable">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>Nama</em></th>
              <th><em>No HP</em></th>
              <th><em>Email</em></th>
              <th><em>Foto</em>
              <th><em>Tgl Registrasi</em></th>
              <th><em>Opsi</em></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($member as $pro) : ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo $pro['nama_lengkap']; ?></span></td>
                <td><span><?php echo $pro['telepon']; ?></span></td>
                <td><i><?php echo $pro['email']; ?></i></td>
                <td>
                  <?php if ($pro['fotoprofil'] != "") { ?>
                    <img width="150px" src="<?= base_url('upload/fotoprofil/' . $pro['fotoprofil']) ?>">
                  <?php } else { ?>
                    <img width="150px" src="<?= base_url('upload/fotoprofil/user.png') ?>">
                  <?php } ?>
                </td>
                <td><i><?php echo date('d-m-Y H:i:s', strtotime($pro['user_created'])); ?></i></td>
                <td>
                  <a href="<?php echo base_url(); ?>admin/edit_pelanggan/<?php echo $pro['user_id']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url(); ?>admin/hapus_pelanggan/<?php echo $pro['user_id']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>