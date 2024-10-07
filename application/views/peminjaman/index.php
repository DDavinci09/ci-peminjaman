<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <div class="box">
        <?php if ($user['level'] !== 'Pegawai') { ?>
            <a href="<?= base_url(); ?>Admin/menunggu" class="btn btn-warning"> Menunggu</a>
            <a href="<?= base_url(); ?>Admin/diterima" class="btn btn-success"> Diterima</a>
            <a href="<?= base_url(); ?>Admin/ditolak" class="btn btn-danger"> Ditolak</a> 
        <?php } else if ($user['level'] == 'Pegawai') { ?>
            <a href="<?= base_url(); ?>Pegawai/menunggu" class="btn btn-warning"> Menunggu</a>
            <a href="<?= base_url(); ?>Pegawai/diterima" class="btn btn-success"> Diterima</a>
            <a href="<?= base_url(); ?>Pegawai/ditolak" class="btn btn-danger"> Ditolak</a> 
        <?php } ?>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Kode Peminjaman</th>
                            <th scope="col" class="align-middle text-center">Tanggal Berangkat</th>
                            <th scope="col" class="align-middle text-center">Waktu</th>
                            <th scope="col" class="align-middle text-center">Peminjam</th>
                            <th scope="col" class="align-middle text-center">Jenis Kendaraan</th>
                            <th scope="col" class="align-middle text-center">Nomor Polisi</th>
                            <th scope="col" class="align-middle text-center">Penanggung Jawab</th>
                            <th scope="col" class="align-middle text-center">Tujuan</th>
                            <th scope="col" class="align-middle text-center">Status Kendaraan</th>
                            <th scope="col" class="align-middle text-center">Status Konfirmasi</th>
                            <?php if ($user["level"] == 'Pegawai') { ?>
                            <th scope="col">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($peminjaman as $pj) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle"><?= $pj['kd_kendaraan'] ?>|<?= $pj['kd_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($pj['tgl_keberangkatan'])) ?></td>
                                <td class="align-middle text-center"><?= $pj['waktu_peminjaman'] ?></td>
                                <td class="align-middle text-center"><?= $pj['nama_user'] ?></td>
                                <td class="align-middle text-center"><?= $pj['jenis_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['nomor_polisi'] ?></td>
                                <td class="align-middle text-center"><?= $pj['penanggung_jawab'] ?></td>
                                <td class="align-middle text-center"><?= $pj['tujuan'] ?></td>
                                <td class="align-middle text-center"><?= $pj['status_kendaraan'] ?></td>
                                <td>
                                <?php if ($user["level"] == 'Kepala Operasional') { ?>
                                    <?php if ($pj["status_konfirmasi"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning" href="<?= base_url(); ?>Peminjaman/aprove/<?= $pj['kd_peminjaman'] ?>">Menunggu</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Terima') { ?>
                                        <a class="btn btn-success" href="">Diterima</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Tolak') { ?>
                                        <a class="btn btn-danger" href="<?= base_url(); ?>Peminjaman/aprove/<?= $pj['kd_peminjaman'] ?>">Ditolak</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Dikembalikan') { ?>
                                        <a class="btn btn-info" href="<?= base_url(); ?>Peminjaman/aprove/<?= $pj['kd_peminjaman'] ?>">Dikembalikan</a>
                                    <?php } ?>
                                <?php } elseif ($user["level"] !== 'Kepala Operasional') { ?>
                                    <?php if ($pj["status_konfirmasi"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning"">Menunggu</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Terima') { ?>
                                        <a class="btn btn-success"">Diterima</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Tolak') { ?>
                                        <a class="btn btn-danger"">Ditolak</a>
                                    <?php } else if ($pj["status_konfirmasi"] == 'Dikembalikan') { ?>
                                        <a class="btn btn-info"">Dikembalikan</a>
                                    <?php } ?>
                                <?php } ?>
                                </td>
                                <?php if ($user["level"] == 'Pegawai') { ?>
                                <td>
                                    <?php if ($pj["status_konfirmasi"] == 'Terima') { ?>
                                    <a class="btn btn-primary" href="<?= base_url(); ?>Pengembalian/kembalikan/<?= $pj['kd_peminjaman'] ?>">Pengembalian</a>
                                    <?php } else { ?>
                                    <a class="btn btn-danger" href="#">Pengembalian</a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->