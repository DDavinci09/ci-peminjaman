<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <?php if ($user['level'] !== 'Pegawai') { ?>
        <form action="<?= base_url(); ?>LaporanAdmin/laporanPengembalian" method="POST" target="_blank">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <input type="date" class="form-control" name="mulai_tanggal" required>
                </div>
                -
                <div class="col-auto">
                    <input type="date" class="form-control" name="sampai_tanggal" required>
                </div>
                <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" target="_blank"><i class="fas fa-download fa-sm text-white-50"></i> PDF</button>
            </div>
        </form>
        <?php } ?>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Kode Pengembalian</th>
                            <th scope="col" class="align-middle text-center">Tanggal Berangkat</th>
                            <th scope="col" class="align-middle text-center">Tanggal Kembali</th>
                            <th scope="col" class="align-middle text-center">Peminjam</th>
                            <th scope="col" class="align-middle text-center">Jenis Kendaraan</th>
                            <th scope="col" class="align-middle text-center">Nomor Polisi</th>
                            <th scope="col" class="align-middle text-center">Tujuan</th>
                            <th scope="col" class="align-middle text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengembalian as $pg) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle"><?= $pg['kd_peminjaman'] ?>|<?= $pg['kd_pengembalian'] ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($pg['tgl_keberangkatan'])) ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($pg['tgl_kembali'])) ?></td>
                                <td class="align-middle text-center"><?= $pg['nama_user'] ?></td>
                                <td class="align-middle text-center"><?= $pg['jenis_kendaraan'] ?></td>
                                <td class="align-middle text-center"><?= $pg['nomor_polisi'] ?></td>
                                <td class="align-middle text-center"><?= $pg['tujuan'] ?></td>
                                <td class="align-middle text-center"><?= $pg['keterangan'] ?></td>
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