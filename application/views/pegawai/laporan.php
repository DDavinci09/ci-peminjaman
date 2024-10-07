<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <?php if ($user['level'] !== 'Pegawai') { ?>
            <a href="<?= base_url(); ?>LaporanAdmin/laporanPegawai" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> PDF</a>
        <?php } ?>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Nama</th>
                            <th scope="col" class="align-middle text-center">NIK</th>
                            <th scope="col" class="align-middle text-center">Jenis Kelamin</th>
                            <th scope="col" class="align-middle text-center">Alamat</th>
                            <th scope="col" class="align-middle text-center">Email</th>
                            <th scope="col" class="align-middle text-center">Nomor HP</th>
                            <th scope="col" class="align-middle text-center">Divisi</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pegawai as $peg) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle"><?= $peg['nama'] ?></td>
                                <td class="align-middle"><?= $peg['nik'] ?></td>
                                <td class="align-middle text-center"><?= $peg['jenis_kelamin'] ?></td>
                                <td class="align-middle"><?= $peg['alamat'] ?></td>
                                <td class="align-middle"><?= $peg['email'] ?></td>
                                <td class="align-middle"><?= $peg['no_hp'] ?></td>
                                <td class="align-middle"><?= $peg['divisi'] ?></td>
                                <td class="align-middle text-center">
                                    <?php if ($peg['status'] == 1) { ?>
                                    Aktif
                                    <?php } else { ?>
                                    Tidak Aktif
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