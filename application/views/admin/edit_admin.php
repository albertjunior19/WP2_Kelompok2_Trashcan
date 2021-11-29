<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <form action="<?= base_url('admin/edit_admin/'.$admin['admin_id']) ?>" method="post" enctype="multipart/form-data">
                <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
                <div class="add-prod-from">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="<?php echo $admin['admin_id'];?>">
                            <input type="text" name="nama" value="<?php echo $admin['nama']; ?>" autofocus="" />
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Username</label>
                            <input type="text" name="username"  value="<?php echo $admin['username']; ?>" autofocus="" />
                            <small class="text-danger"><?php echo form_error('username'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email_reg"  value="<?php echo $admin['email']; ?>" />
                            <small class="text-danger"><?php echo form_error('email_reg'); ?></small>
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