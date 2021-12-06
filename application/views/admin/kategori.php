<div class="gap inner-bg">
  <div class="element-title">
    <div class="table-styles">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
      <a href="<?php echo base_url(); ?>admin/add_kategori" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Kategori</a>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive" id="myTable">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>Nama Kategori</em></th>
              <th><em>Url Kategori</em></th>
              <th><em>Opsi</em></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kategori as $pro) : ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo $pro['kategori']; ?></span></td>
                <td><i><?php echo $pro['url']; ?></i></td>
                <td>
                <a href="<?php echo base_url(); ?>admin/edit_kategori/<?php echo $pro['id_kategori']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url(); ?>admin/hapus_kategori/<?php echo $pro['id_kategori']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>