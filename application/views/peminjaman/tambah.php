<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Kode Kendaraan</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Merk</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Nomor Polisi</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('./assets/img/') . $kd['gambar']; ?>" alt="" width="120" height="120">
                                                <td class="align-middle"><?= $kd['kd_kendaraan'] ?></td>
                                                <td class="align-middle"><?= $kd['jenis_kendaraan'] ?></td>
                                                <td class="align-middle"><?= $kd['merk'] ?></td>
                                                <td class="align-middle"><?= $kd['warna'] ?></td>
                                                <td class="align-middle"><?= $kd['nomor_polisi'] ?></td>
                                                <td class="align-middle"><?= $kd['status_kendaraan'] ?></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Peminjaman/tambah/'. $kd['kd_kendaraan']); ?>
                    <form action="" method="post">
                        <!-- input kd kendaraan dan id user -->
                        <input type="hidden" name="kd_kendaraan" value="<?= $kd['kd_kendaraan']; ?>">
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <input type="hidden" name="nama_user" value="<?= $user['nama']; ?>">
                        <input type="hidden" name="status_konfirmasi" value="Menunggu">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Peminjaman</label>
                                    <input type="text" class="form-control" id="kd_peminjaman" name="kd_peminjaman" value="<?= $autoKD; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" id="tgl_keberangkatan" name="tgl_keberangkatan" value="<?= set_value('tgl_keberangkatan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tgl_keberangkatan'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Waktu Peminjaman</label>
                                    <input type="text" class="form-control"  id="waktu_peminjaman" name="waktu_peminjaman" value="<?= set_value('waktu_peminjaman'); ?>">
                                    <small class="form-text text-danger"><?= form_error('waktu_peminjaman'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="<?= set_value('penanggung_jawab'); ?>">
                                    <small class="form-text text-danger"><?= form_error('penanggung_jawab'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" class="form-control"  id="tujuan" name="tujuan" value="<?= set_value('tujuan'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tujuan'); ?></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Peminjaman</button>
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