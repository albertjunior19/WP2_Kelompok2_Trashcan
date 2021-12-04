<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <form action="<?= base_url('admin/add_kategori')?>" method="post" enctype="multipart/form-data">
                <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Kategori</label>
                            <input type="text" name="kategori" value="<?php echo set_value('kategori'); ?>" placeholder="">
                            <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                        </div>
                        <div class="col-md-12">
                            <div class="buttonz">
                                <button type="submit">Simpan</button>
                                <button type="button" onclick="goBack()">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>