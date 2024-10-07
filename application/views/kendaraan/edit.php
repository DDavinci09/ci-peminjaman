<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Kendaraan/edit/' . $kd['kd_kendaraan']); ?>
                    <form action="" method="post">
                        <div class="row">
                            <!-- input id untuk ubah data berdasar id -->
                            <input type="hidden" name="kd_kendaraan" value="<?= $kd['kd_kendaraan']; ?>">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Kendaraan</label>
                                    <input type="text" class="form-control" id="kd_kendaraan" name="kd_kendaraan" value="<?= $kd['kd_kendaraan']; ?>" readonly>
                                    <small class="form-text text-danger"><?= form_error('kd_kendaraan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kendaraan</label>
                                    <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" >
                                        <option value="Motor" <?php if($kd['jenis_kendaraan'] == 'Motor') echo 'selected'; ?>>Motor</option>
                                        <option value="Mobil" <?php if($kd['jenis_kendaraan'] == 'Mobil') echo 'selected'; ?>>Mobil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control"  id="merk" name="merk" value="<?= $kd['merk']; ?>">
                                    <small class="form-text text-danger"><?= form_error('merk'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nomor Polisi</label>
                                    <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="<?= $kd['nomor_polisi']; ?>">
                                    <small class="form-text text-danger"><?= form_error('nomor_polisi'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" class="form-control" id="warna" name="warna" value="<?= $kd['warna']; ?>">
                                    <small class="form-text text-danger"><?= form_error('warna'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" class="form-control" type="file" class="form-control" id="file" name="userfile" value="<?= $kd['gambar']; ?>">
                                <small><?= $kd['gambar']; ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Kendaraan</label>
                                    <select class="form-control" name="status_kendaraan" id="status_kendaraan" >
                                        <option value="Tersedia" <?php if($kd['status_kendaraan'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                                        <option value="Digunakan" <?php if($kd['status_kendaraan'] == 'Digunakan') echo 'selected'; ?>>Digunakan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit Data</button>
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