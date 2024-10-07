<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Kendaraan/tambah'); ?>
                    <form action="Kendaraan/tambah" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Kendaraan</label>
                                    <input type="text" class="form-control" id="kd_kendaraan" name="kd_kendaraan" value="<?= $autoKD; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kendaraan</label>
                                    <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" value="<?= set_value('jenis_kendaraan'); ?>">
                                        <option value="">- - Jenis Kendaraan - -</option>
                                        <option value="Motor">Motor</option>
                                        <option value="Mobil">Mobil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control"  id="merk" name="merk" value="<?= set_value('merk'); ?>">
                                    <small class="form-text text-danger"><?= form_error('merk'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nomor Polisi</label>
                                    <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="<?= set_value('nomor_polisi'); ?>">
                                    <small class="form-text text-danger"><?= form_error('nomor_polisi'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" class="form-control" id="warna" name="warna" value="<?= set_value('warna'); ?>">
                                    <small class="form-text text-danger"><?= form_error('warna'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" class="form-control" type="file" class="form-control" id="file" name="userfile" value="<?= set_value('file'); ?>">
                                <small class="form-text text-danger"><?= form_error('image'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Kendaraan</label>
                                    <select class="form-control" name="status_kendaraan" id="status_kendaraan" value="<?= set_value('status_kendaraan'); ?>">
                                        <option value="">- - Status Kendaraan - -</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Digunakan">Digunakan</option>
                                    </select>
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