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
                                <td class="align-middle text-center"><img src="<?= base_url('./assets/img/') . $pj['gambar']; ?>" alt="" width="120" height="120"></td>
                                <td class="align-middle text-center"><?= $pj['kd_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= $pj['tgl_keberangkatan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['waktu_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= $pj['nama_user'] ?></td>
                                <td class="align-middle text-center"><?= $pj['kd_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['jenis_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['nomor_polisi'] ?></td>
                                <td class="align-middle text-center"><?= $pj['penanggung_jawab'] ?></td>
                                <td class="align-middle text-center"><?= $pj['tujuan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['status_kendaraan'] ?></td>
                                <td class="align-middle text-center">
                                <?php if ($pj["status_konfirmasi"] == 'Menunggu') { ?>
                                    <a class="btn btn-warning"><?= $pj['status_konfirmasi'] ?></a>
                                <?php } else if ($pj["status_konfirmasi"] == 'Terima') { ?>
                                    <a class="btn btn-success"><?= $pj['status_konfirmasi'] ?></a>
                                <?php } else { ?>
                                    <a class="btn btn-danger"><?= $pj['status_konfirmasi'] ?></a>
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
                    <?php echo form_open_multipart('Peminjaman/aprove/' . $pj['kd_peminjaman']); ?>
                    <input type="hidden" name="kd_kendaraan" value="<?= $pj['kd_kendaraan']; ?>">
                    <form action="Peminjaman/tambah" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label>Status Konfirmasi</label>
                                    <select class="form-control" name="status_konfirmasi" id="status_konfirmasi" >
                                        <option value="Terima" <?php if($pj['status_konfirmasi'] == 'Terima') echo 'selected'; ?>>Terima</option>
                                        <option value="Tolak" <?php if($pj['status_konfirmasi'] == 'Tolak') echo 'selected'; ?>>Tolak</option>
                                        <option value="Menunggu" <?php if($pj['status_konfirmasi'] == 'Menunggu') echo 'selected'; ?>>Menunggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Konfirmasi</button>
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