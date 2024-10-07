<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url(); ?>User/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th scope="col" class="align-middle text-center">Level</th>
                            <th scope="col" class="align-middle text-center">Status</th>
                            <th scope="col" class="align-middle text-center">Action</th>
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
                                <td class="align-middle text-center"><?= $peg['level'] ?></td>
                                <td class="align-middle text-center">
                                <?php if ($peg['id_user'] == $user['id_user']) { ?>
                                    <?php if ($peg['status'] == 1) { ?>
                                    <a class="btn btn-sm btn-success m-1">Aktif</a>
                                    <?php } else { ?>
                                    <a class="btn btn-sm btn-danger m-1">Tidak Aktif</a>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if ($peg['status'] == 1) { ?>
                                    <a href="<?= base_url(); ?>User/editStatusActive/<?= $peg['id_user']; ?>" class="btn btn-sm btn-success m-1">Aktif</a>
                                    <?php } else { ?>
                                    <a href="<?= base_url(); ?>User/editStatusDeactive/<?= $peg['id_user']; ?>" class="btn btn-sm btn-danger m-1">Tidak Aktif</a>
                                    <?php } ?>
                                <?php } ?>
                                </td>
                                <td>
                                <?php if ($peg['id_user'] == $user['id_user']) { ?>
                                    <a class="btn btn-sm btn-danger m-1 btn-delete"><i class="fas fa-fw fa-fw fa-trash"></i></a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-sm btn-danger m-1 btn-delete" onclick="deleteConfirmation('<?= base_url(); ?>User/hapus/<?= $peg['id_user']; ?>')" ><i class="fas fa-fw fa-fw fa-trash"></i></a>
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