<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h6>Kendaraan</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                Total : <?= $totalkendaraan; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" href="">
            <div class="card border-left-success border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h6>Tersedia</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                <?= $kendaraantersedia; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" href="">
            <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <h6>Digunakan</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                 <?= $kendaraandigunakan; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h6>Peminjaman</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                Total : <?= $totalpeminjaman; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" href="">
            <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <h6>Menunggu</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                            <?= $menunggu; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" href="">
            <div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                <h6>Ditolak</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                <?= $ditolak; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4" href="">
            <div class="card border-left-success border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h6>Diterima</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                                <?= $diterima; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-motorcycle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h6>Pengembalian</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                            Total : <?= $totalpengembalian; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-warehouse fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4" href="">
            <div class="card border-left-secondary border-bottom-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                <h6>Pengembalian Motor</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                            <?= $motor; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-warehouse fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4" href="">
            <div class="card border-left-dark border-bottom-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                <h6>Pengembalian Mobil</h6>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-gray-800">
                            <?= $mobil; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-warehouse fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->