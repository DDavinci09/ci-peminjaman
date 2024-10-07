<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Kode Pengembalian</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Nomor Polisi</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengembalian as $pg) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pg['kd_pengembalian'] ?>/</td>
                                <td><?= date("d/m/Y", strtotime($pg['tgl_kembali'])) ?></td>
                                <td><?= $pg['nama_user'] ?></td>
                                <td><?= $pg['jenis_kendaraan'] ?></td>
                                <td><?= $pg['nomor_polisi'] ?></td>
                                <td><?= $pg['tujuan'] ?></td>
                                <td><?= $pg['keterangan'] ?></td>
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