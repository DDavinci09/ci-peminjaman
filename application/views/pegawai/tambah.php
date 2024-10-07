<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('User/tambah'); ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                                    <input type="hidden" class="form-control" id="password" name="password" value="123">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="level" id="level" value="<?= set_value('level'); ?>">
                                        <option value="">- - Level - -</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Kepala Operasional">Kepala Operasional</option>
                                        <option value="Pegawai">Pegawai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status" value="<?= set_value('status'); ?>">
                                        <option value="">- - Status - -</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control"  id="nama" name="nama" value="<?= set_value('nama'); ?>">
                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" class="form-control"  id="nik" name="nik" value="<?= set_value('nik'); ?>">
                                    <small class="form-text text-danger"><?= form_error('nik'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin'); ?>">
                                        <option value="">- - Jenis Kelamin - -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"  id="email" name="email" value="<?= set_value('email'); ?>">
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nomor HP</label>
                                    <input type="number" class="form-control"  id="no_hp" name="no_hp" value="<?= set_value('no_hp'); ?>">
                                    <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control"  id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <input type="text" class="form-control"  id="divisi" name="divisi" value="<?= set_value('divisi'); ?>">
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