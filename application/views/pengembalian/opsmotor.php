<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle text-center">NO</th>
                            <th scope="col" class="align-middle text-center">Kode Ops Motor</th>
                            <th scope="col" class="align-middle text-center">Tanggal Pinjam</th>
                            <th scope="col" class="align-middle text-center">Tanggal Kembali</th>
                            <th scope="col" class="align-middle text-center">Peminjam</th>
                            <th scope="col" class="align-middle text-center">Nomor Polisi</th>
                            <th scope="col" class="align-middle text-center">Keterangan</th>
                            <th scope="col" class="align-middle text-center">BBM</th>
                            <th scope="col" class="align-middle text-center">Parkir</th>
                            <th scope="col" class="align-middle text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($opsmotor as $mt) : ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle"><?= $mt['kd_pengembalian'] ?>|<?= $mt['kd_ops_motor'] ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($mt['tgl_keberangkatan'])) ?></td>
                                <td class="align-middle text-center"><?= date("d/m/Y", strtotime($mt['tgl_kembali'])) ?></td>
                                <td class="align-middle text-center"><?= $mt['nama_user'] ?></td>
                                <td class="align-middle text-center"><?= $mt['nomor_polisi'] ?></td>
                                <td class="align-middle"><?= $mt['keterangan'] ?></td>
                                <td class="align-middle">Rp.<?= $mt['bbm'] ?></td>
                                <td class="align-middle">Rp.<?= $mt['parkir'] ?></td>
                                <td class="align-middle"><b> Rp.<?= $mt['total'] ?> </b></td>
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