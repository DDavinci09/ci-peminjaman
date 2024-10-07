<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('User/updateProfile'); ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control"  id="nama" name="nama" value="<?= $user['nama']; ?>">
                                    <input type="hidden" class="form-control"  id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control"  id="nik" name="nik" value="<?= $user['nik']; ?>">
                                    <small class="form-text text-danger"><?= form_error('nik'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>">
                                        <option value="">- - Jenis Kelamin - -</option>
                                        <option value="Laki-laki" <?php if($user['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?php if($user['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"  id="email" name="email" value="<?= $user['email']; ?>">
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="number" class="form-control"  id="no_hp" name="no_hp" value="<?= $user['no_hp']; ?>">
                                    <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control"  id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <input type="text" class="form-control"  id="divisi" name="divisi" value="<?= $user['divisi']; ?>">
                                    <small class="form-text text-danger"><?= form_error('divisi'); ?></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Tambah Data</button>
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