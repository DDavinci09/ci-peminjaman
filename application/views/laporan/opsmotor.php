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
                LAPORAN BIAYA OPERASIONAL PENGEMBALIAN MOTOR 
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
                            <th scope="col" align="center">Kode Ops Motor</th>
                            <th scope="col" align="center">Tanggal Pinjam</th>
                            <th scope="col" align="center">Tanggal Kembali</th>
                            <th scope="col" align="center">Peminjam</th>
                            <th scope="col" align="center">Nomor Polisi</th>
                            <th scope="col" align="center">Keterangan</th>
                            <th scope="col" align="center">BBM</th>
                            <th scope="col" align="center">Parkir</th>
                            <th scope="col" align="center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($opsmotor as $mt) : ?>
                            <tr>
                                <td align="center"><?= $i++; ?></td>
                                <td align="center"><?= $mt['kd_ops_motor'] ?></td>
                                <td align="center"><?= date("d/m/Y", strtotime($mt['tgl_keberangkatan'])) ?></td>
                                <td align="center"><?= date("d/m/Y", strtotime($mt['tgl_kembali'])) ?></td>
                                <td align="center"><?= $mt['nama_user'] ?></td>
                                <td align="center"><?= $mt['nomor_polisi'] ?></td>
                                <td align="center"><?= $mt['keterangan'] ?></td>
                                <td>Rp.<?= $mt['bbm'] ?></td>
                                <td>Rp.<?= $mt['parkir'] ?></td>
                                <td><b> Rp.<?= $mt['total'] ?> </b></td>
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