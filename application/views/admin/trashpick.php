<div class="gap inner-bg">
    <div class="element-title">
        <h4><?php echo $title; ?></h4>
        <div class="table-styles">
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
            <div class="widget">
                <div class="table-responsive">
                    <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>