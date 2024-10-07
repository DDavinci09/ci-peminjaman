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
                LAPORAN DATA PEGAWAI KANTOR BUPATI SIJUNJUNG
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
                            <th scope="col" align="center">Nama</th>
                            <th scope="col" align="center">NIK</th>
                            <th scope="col" align="center">Jenis Kelamin</th>
                            <th scope="col" align="center">Alamat</th>
                            <th scope="col" align="center">Email</th>
                            <th scope="col" align="center">No HP</th>
                            <th scope="col" align="center">Divisi</th>
                            <th scope="col" align="center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach ($pegawai as $peg) : ?>
                            <tr>
                                <td align="center"><?= $i++; ?></td>
                                <td align="center"><?= $peg['nama'] ?></td>
                                <td align="center"><?= $peg['nik'] ?></td>
                                <td align="center"><?= $peg['jenis_kelamin'] ?></td>
                                <td align="center"><?= $peg['alamat'] ?></td>
                                <td align="center"><?= $peg['email'] ?></td>
                                <td align="center"><?= $peg['no_hp'] ?></td>
                                <td align="center"><?= $peg['divisi'] ?></td>
                                <td align="center">
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