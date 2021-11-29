<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <form action="<?= base_url('admin/add_pelanggan') ?>" method="post" enctype="multipart/form-data">
                <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" autofocus="" />
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>No HP</label>
                            <input type="text" name="telepon" value="<?php echo set_value('telepon'); ?>" autofocus="" />
                            <small class="text-danger"><?php echo form_error('telepon'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email_reg" value="" />
                            <small class="text-danger"><?php echo form_error('email_reg'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Sandi</label>
                            <input type="text" name="password" />
                            <small class="text-danger"><?php echo form_error('password'); ?></small>
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