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

<!-- Cart Page -->
<div class="cart_page_area">
    <div class="container">
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
        <div class="cart-actions cart-button-cuppon">
            <div class="cuppon-wrap text-center">
                <h3>Riwayat Transaksi Trashpick Terakhir Anda</h3>
                <div class="table-responsive mt-5">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Biaya</th>
                                <th scope="col">Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($trashpick) == 0) { ?>
                                <tr>
                                    <td colspan="5">Anda belum pernah melakukan transaksi</td>
                                </tr>
                            <?php } else { ?>
                                <?php $i = 1; ?>
                                <?php foreach ($trashpick as $trx) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $i . '.'; ?></th>
                                        <td><?php echo $trx['notelp']; ?></td>
                                        <td><?php echo $trx['alamat']; ?></td>
                                        <td><?php echo $trx['jenisbarang']; ?></td>
                                        <td><?php echo $trx['berat']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($trx['tanggalpickup'])); ?></td>
                                        <td><?php echo $trx['waktupickup']; ?></td>
                                        <td><i>Rp. <?php echo number_format($trx['biayapickup'], 0, ',', '.'); ?></i></td>
                                        <td>
                                            <img src="<?= base_url('assets/upload/' . $trx['uploadbukti']) ?>">
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>