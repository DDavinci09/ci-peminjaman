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
                LAPORAN DATA KENDARAAN KANTOR BUPATI SIJUNJUNG
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
                            <th scope="col" align="center">Gambar</th>
                            <th scope="col" align="center">Kode</th>
                            <th scope="col" align="center">Jenis</th>
                            <th scope="col" align="center">Merk</th>
                            <th scope="col" align="center">Warna</th>
                            <th scope="col" align="center">Nomor Polisi</th>
                            <th scope="col" align="center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kendaraan as $kd) : ?>
                            <tr>
                                <td align="center"><?= $i++; ?></td>
                                <td align="center">
                                    <img src="assets/img/<?= $kd['gambar']; ?>" alt="" width="120" height="120">
                                </td>
                                <td align="center"><?= $kd['kd_kendaraan'] ?></td>
                                <td align="center"><?= $kd['jenis_kendaraan'] ?></td>
                                <td align="center"><?= $kd['merk'] ?></td>
                                <td align="center"><?= $kd['warna'] ?></td>
                                <td align="center"><?= $kd['nomor_polisi'] ?></td>
                                <td align="center"><?= $kd['status_kendaraan'] ?></td>
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