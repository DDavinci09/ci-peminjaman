<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <?php if ($user['level'] == 'Admin') { ?>
        <a href="<?= base_url(); ?>kendaraan/edit/<?= $kd['kd_kendaraan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Edit Data</a>
        <?php } ?>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Kendaraan</label>
                                    <input type="text" class="form-control" id="kd_kendaraan" name="kd_kendaraan" value="<?= $kd['kd_kendaraan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kendaraan</label>
                                    <input class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" value="<?= $kd['jenis_kendaraan']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control"  id="merk" name="merk" value="<?= $kd['merk']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nomor Polisi</label>
                                    <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="<?= $kd['nomor_polisi']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" class="form-control" id="warna" name="warna" value="<?= $kd['warna']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Kendaraan</label>
                                    <input type="text" class="form-control" id="status_kendaraan" name="status_kendaraan" value="<?= $kd['status_kendaraan']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="image">Image</label><br>
                                <img src="<?= base_url('./assets/img/') . $kd['gambar']; ?>" alt="" width="150" height="150">
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->