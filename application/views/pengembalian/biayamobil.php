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
                            <th scope="col" class="align-middle text-center">Gambar</th>
                            <th scope="col" class="align-middle text-center">Kode Peminjaman</th>
                            <th scope="col" class="align-middle text-center">Tanggal Peminjaman</th>
                            <th scope="col" class="align-middle text-center">Tanggal Kembali</th>
                            <th scope="col" class="align-middle text-center">Waktu</th>
                            <th scope="col" class="align-middle text-center">Nama Peminjam</th>
                            <th scope="col" class="align-middle text-center">Kode Kendaraan</th>
                            <th scope="col" class="align-middle text-center">Jenis</th>
                            <th scope="col" class="align-middle text-center">Nomor Polisi</th>
                            <th scope="col" class="align-middle text-center">Penanggung Jawab</th>
                            <th scope="col" class="align-middle text-center">Tujuan</th>
                            <th scope="col" class="align-middle text-center">Status Kendaraan</th>
                            <th scope="col" class="align-middle text-center">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="align-middle text-center"><img src="<?= base_url('./assets/img/') . $pg['gambar']; ?>" alt="" width="120" height="120"></td>
                                <td class="align-middle text-center"><?= $pg['kd_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($pg['tgl_keberangkatan'])) ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($pg['tgl_kembali'])) ?></td>
                                <td class="align-middle text-center"><?= $pg['waktu_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= $pg['nama_user'] ?></td>
                                <td class="align-middle text-center"><?= $pg['kd_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pg['jenis_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pg['nomor_polisi'] ?></td>
                                <td class="align-middle text-center"><?= $pg['penanggung_jawab'] ?></td>
                                <td class="align-middle text-center"><?= $pg['tujuan'] ?></td>
                                <td class="align-middle text-center"><?= $pg['status_kendaraan'] ?></td>
                                <td class="align-middle text-center">
                                <?php if ($pg["status_konfirmasi"] == 'Menunggu') { ?>
                                    <a class="btn btn-warning"><?= $pg['status_konfirmasi'] ?></a>
                                <?php } else if ($pg["status_konfirmasi"] == 'Terima') { ?>
                                    <a class="btn btn-success"><?= $pg['status_konfirmasi'] ?></a>
                                <?php } else { ?>
                                    <a class="btn btn-danger"><?= $pg['status_konfirmasi'] ?></a>
                                <?php } ?>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
                <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('Pengembalian/tambahbiayaMobil/'. $pg['kd_pengembalian']); ?>
                    <form action="" method="post">
                        <!-- input kd kendaraan dan id user -->
                        <input type="hidden" name="kd_pengembalian" value="<?= $pg['kd_pengembalian']; ?>">
                        <input type="hidden" name="nama_user" value="<?= $pg['nama_user']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Ops Mobil</label>
                                    <input type="text" class="form-control" id="kd_ops_mobil" name="kd_ops_mobil" value="<?= $autoKD; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>BBM</label>
                                    <input type="text" class="form-control" id="bbm" name="bbm" value="<?= set_value('bbm'); ?>">
                                    <small class="form-text text-danger"><?= form_error('bbm'); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>TOL</label>
                                    <input type="text" class="form-control"  id="tol" name="tol" value="<?= set_value('tol'); ?>">
                                    <small class="form-text text-danger"><?= form_error('tol'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" id="total" name="total" value="............">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Parkir</label>
                                    <input type="text" class="form-control"  id="parkir" name="parkir" value="<?= set_value('parkir'); ?>">
                                    <small class="form-text text-danger"><?= form_error('parkir'); ?></small>
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