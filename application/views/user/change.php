<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('User/gantiUsername'); ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control"  id="username" name="username" value="<?= $user['username']; ?>">
                                    <input type="hidden" class="form-control"  id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                    <button type="submit" class="btn btn-primary float-right">Ganti Username</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php echo form_close(); ?>
                    
                    <?php echo form_open_multipart('User/gantiPassword'); ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control"  id="password" name="password" value="">
                                    <input type="hidden" class="form-control"  id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                                    <?= $this->session->flashdata('message');; ?>
                                    <small class="form-text text-success"><?= form_error('password'); ?></small>
                                    <button type="submit" class="btn btn-primary float-right">Ganti Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->