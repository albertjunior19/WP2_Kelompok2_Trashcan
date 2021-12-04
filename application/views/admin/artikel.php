<div class="gap inner-bg">
                  <div class="element-title">
                  <div class="table-styles">
                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                    <a href="<?php echo base_url(); ?>admin/add_post" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Artikel</a>
                    <div class="widget">
                      <table class="prj-tbl striped bordered table-responsive" id="myTable">
                        <thead class="">
                          <tr>
                            <th><em>No</em></th>
                            <th><em>Tanggal</em></th>
                            <th><em>Judul</em></th>
                            <th><em>Isi</em></th>
                            <th><em>Foto</em></th>
                            <th><em>Opsi</em></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach($artikel as $pro): ?>
                          <tr>
                            <td><?php echo $i.'.'; ?></td>
                            <td><span><?php echo date('d-m-Y H:i:s', strtotime($pro['blog_tgl'])); ?></span></td>
                            <td><i><?php echo $pro['blog_judul']; ?></i></td>
                            <td><i><?php echo word_limiter($pro['blog_isi'], 5); ?></i></td>
                            <td><i><img src="<?php echo base_url(); ?>assets_home/img/blog/<?php echo $pro['blog_gambar']; ?>" width="40" alt="<?php echo $pro['blog_judul']; ?>"></i></td>
                            <td>
                              <a href="<?php echo base_url(); ?>admin/edit_post/<?php echo $pro['blog_id']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url(); ?>admin/hapus_post/<?php echo $pro['blog_id']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>