<div class="gap inner-bg">
                  <div class="element-title">
                    <h4><?php echo $title; ?></h4>
             
                  <div class="table-styles">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <div class="widget">
                      <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                          <tr>
                            <th><em>No</em></th>
                            <th><em>Tgl</em></th>
                            <th><em>Nama</em></th>
                            <th><em>Email</em></th>
                            <th><em>No HP</em></th>
                            <th><em>Subjek</em></th>
                            <th><em>Isi Pesan</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($pesan as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['pesan_tgl'])); ?></span></td>
                            <td><i><?php echo $pro['pesan_nama']; ?></i></td>
                            <td><i><?php echo $pro['pesan_email']; ?></i></td>
                            <td><i><?php echo $pro['nohp']; ?></i></td>
                            <td><?php echo $pro['pesan_subjek']; ?></td>
                            <td><?php echo $pro['pesan_isi']; ?></td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>