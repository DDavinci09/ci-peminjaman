<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
            <?php if ($user['level'] !== 'Pegawai') { ?>
            <a href="<?= base_url(); ?>LaporanAdmin/laporanKendaraan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> PDF</a>
            <?php } ?>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Gambar</th>
                            <th scope="col">Kode Kendaraan</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Nomor Polisi</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kendaraan as $kd) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle text-center">
                                    <img src="<?= base_url('./assets/img/') . $kd['gambar']; ?>" alt="" width="120" height="120">
                                </td>
                                <td class="align-middle"><?= $kd['kd_kendaraan'] ?></td>
                                <td class="align-middle"><?= $kd['jenis_kendaraan'] ?></td>
                                <td class="align-middle"><?= $kd['merk'] ?></td>
                                <td class="align-middle"><?= $kd['warna'] ?></td>
                                <td class="align-middle"><?= $kd['nomor_polisi'] ?></td>
                                <td class="align-middle text-center">
                                    <?php if ($kd["status_kendaraan"] == 'Tersedia') { ?>
                                        <a class="btn btn-success"><?= $kd['status_kendaraan'] ?></a>
                                    <?php } else { ?>
                                        <a class="btn btn-warning"><?= $kd['status_kendaraan'] ?></a>
                                    <?php } ?>
                                </td>
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