<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Peminjaman</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Heading -->
    <div class="sidebar-heading">
        <b>User</b>
    </div>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>user/myProfile">
            <i class="fas fa-fw fa-home"></i>
            <span><b>My Profile</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Menu Admin -->
    <?php if ($this->session->userdata('level') !== 'Pegawai') { ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            <b>Menu Admin</b>
        </div>

        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>admin">
                <i class="fas fa-fw fa-home"></i>
                <span><b>Dasboard</b></span></a>
        </li>

        <?php if ($this->session->userdata('level') == 'Admin') { ?>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url(); ?>admin/data_pegawai">
                    <i class="fas fa-fw fa-marker"></i>
                    <span><b>Data Pegawai</b></span></a>
            </li>
        <?php } ?>

        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url(); ?>admin/data_kendaraan">
                <i class="fas fa-fw fa-marker"></i>
                <span><b>Data Kendaraan</b></span></a>
        </li>

        <li class="nav-item">
            <a href="#peminjaman" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                    class="fas fa-fw fa-marker"></i> <span><b>Kelola Peminjaman</b></span></a>
            <ul class="collapse list-unstyled" id="peminjaman">
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/menunggu">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Menunggu</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/ditolak">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Ditolak</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/diterima">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Diterima</b></span></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#pengembalian" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                    class="fas fa-fw fa-marker"></i> <span><b>Kelola Pengembalian</b></span></a>
            <ul class="collapse list-unstyled" id="pengembalian">
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/biayaopsmotor">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Pengembalian Motor</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/biayaopsmobil">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Pengembalian Mobil</b></span></a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#laporan" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                    class="fas fa-fw fa-marker"></i> <span><b>Laporan</b></span></a>
            <ul class="collapse list-unstyled" id="laporan">
                <?php if ($this->session->userdata('level') == 'Admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanPegawai">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Data Pegawai</b></span></a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanKendaraan">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Data Kendaraan</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanPeminjaman">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Data Peminjaman</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanPengembalian">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Data Pengembalian</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanbiayaopsmotor">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Biaya Ops Motor</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url(); ?>admin/laporanbiayaopsmobil">
                        <i class="fas fa-fw fa-marker"></i>
                        <span><b>Biaya Ops Mobil</b></span></a>
                </li>
            </ul>
        </li>

    <?php } else if ($this->session->userdata('level') == 'Pegawai') { ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                <b>Menu Pegawai</b>
            </div>

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai">
                    <i class="fas fa-fw fa-home"></i>
                    <span><b>Dasboard</b></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/data_kendaraan">
                    <i class="fas fa-fw fa-marker"></i>
                    <span><b>Data Kendaraan</b></span></a>
            </li>

            <li class="nav-item">
                <a href="#peminjaman" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                        class="fas fa-fw fa-marker"></i> <span><b>Kelola Peminjaman</b></span></a>
                <ul class="collapse list-unstyled" id="peminjaman">
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/menunggu">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Menunggu</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/ditolak">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Ditolak</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/diterima">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Diterima</b></span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#pengembalian" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                        class="fas fa-fw fa-marker"></i> <span><b>Kelola Pengembalian</b></span></a>
                <ul class="collapse list-unstyled" id="pengembalian">
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/biayaopsmotor">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Pengembalian Motor</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/biayaopsmobil">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Pengembalian Mobil</b></span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#laporan" data-toggle="collapse" aria-expanded="false" class="nav-link pb-0 dropdown-toggle"><i
                        class="fas fa-fw fa-marker"></i> <span><b>Laporan</b></span></a>
                <ul class="collapse list-unstyled" id="laporan">
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/laporanPeminjaman">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Data Peminjaman</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/laporanPengembalian">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Data Pengembalian</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/laporanbiayaopsmotor">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Biaya Ops Motor</b></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="<?= base_url(); ?>pegawai/laporanbiayaopsmobil">
                            <i class="fas fa-fw fa-marker"></i>
                            <span><b>Biaya Ops Mobil</b></span></a>
                    </li>
                </ul>
            </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Heading -->
    <div class="sidebar-heading">
        <b>Logout</b>
    </div>



    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->