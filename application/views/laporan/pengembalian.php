<head>
    <style>
        .line-title {
            border-style: inset;
            border-top: 1px #000;
        }
    </style>
    
</head>

<body>
    <table border="1" width="100%" cellpadding="1">
        <tr>
            <td align="center">
                <img src="assets/logo/logo.png" style="position: center; width: 70px; height: auto;">
            </td>
            <th colspan="3" align="center">
                LAPORAN PENGEMBALIAN KENDARAAN
                <br>
                KANTOR BUPATI SIJUNJUNG
                <br>
                TANGGAL <?= date("d-m-Y", strtotime($mulai_tgl)) ?> sampai <?= date("d-m-Y", strtotime($sampai_tgl)) ?> Total : <?= $totalkembali; ?>
                <br>
                <small>
                    <small>
                        Jl. Prof. M. Yamin SH No.5, Muaro, Kecamaten Sijunjung, Kabupaten Sijunjung, Sumatera Barat 27562
                    </small>
                </small>
                <br>
                <small>
                    <small>
                        Website : www.infopublik.sijunjung.go.id
                    </small>
                </small>
            </th>
        </tr>
    </table>
    <br>
                <table border="1" width="100%" cellpadding="1">
                    <thead>
                        <tr>
                            <th scope="col" align="center">NO</th>
                            <th scope="col" align="center">Kode Pengembalian</th>
                            <th scope="col" align="center">Tanggal Berangkat</th>
                            <th scope="col" align="center">Tanggal Kembali</th>
                            <th scope="col" align="center">Waktu Kembali</th>
                            <th scope="col" align="center">Peminjam</th>
                            <th scope="col" align="center">Jenis Kendaraan</th>
                            <th scope="col" align="center">Nomor Polisi</th>
                            <th scope="col" align="center">Tujuan</th>
                            <th scope="col" align="center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengembalian as $pg) : ?>
                            <tr>
                                <td align="center"><?= $i++; ?></td>
                                <td align="center"><?= $pg['kd_pengembalian'] ?></td>
                                <td align="center"><?= date("d/m/Y", strtotime($pg['tgl_keberangkatan'])) ?></td>
                                <td align="center"><?= date("d/m/Y", strtotime($pg['tgl_kembali'])) ?></td>
                                <td align="center"><?= $pg['waktu_kembali'] ?></td>
                                <td align="center"><?= $pg['nama_user'] ?></td>
                                <td align="center"><?= $pg['jenis_kendaraan'] ?></td>
                                <td align="center"><?= $pg['nomor_polisi'] ?></td>
                                <td align="center"><?= $pg['tujuan'] ?></td>
                                <td align="center"><?= $pg['keterangan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <br>
    <table border="0" cellpadding="1">
        <tr>
            <td colspan="2" style="color: white;">
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            </td>
            <th colspan="2" align="center">
                BUPATI SIJUNJUNG
                <br>
                <br>
                <br>
                <br>
                BENNY DWIFA YUSWIR, S.STP., M.Si
            </th>
        </tr>
    </table>
            
</body>