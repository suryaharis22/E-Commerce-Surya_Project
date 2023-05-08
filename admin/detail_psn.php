<?php
include '../master_tem/header.php';
?>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php' ?>


        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php
                include 'topbar.php';
                ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Detail</a></li>

                                    </ol>
                                </div>
                                <h4 class="page-title">Detail Pesanan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php $id = $_GET['id'];

                    $sql = mysqli_query($mysqli, "SELECT * FROM pesanan, produk WHERE produk.id_pd = pesanan.id_pd") or die(mysqli_error($mysqli));
                    $pesanan    = mysqli_fetch_array($sql);


                    ?>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-7">
                            <!-- project card -->
                            <div class="card d-block">
                                <div class="card-body">

                                    <div class="form-check float-start">
                                        <input type="checkbox" class="form-check-input" id="completedCheck">
                                        <label class="form-check-label" for="completedCheck">
                                            Kode Trx <?= $pesanan['id'] ?></label>
                                    </div> <!-- end form-check-->

                                    <div class="clearfix"></div>

                                    <h3 class="mt-3"><?= $pesanan['nama_psn'] ?></h3>

                                    <div class="row">
                                        <div class="col-2">
                                            <!-- assignee -->
                                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase"><?= $pesanan['nama'] ?> </p>
                                            <div class="d-flex">
                                                <img src="<?php echo "../assets/images/produk/" . $pesanan['gambar']; ?>" alt="Arya S" height="100">
                                                <div class="row">
                                                    <div>
                                                        <h5 class="mt-1 font-14">
                                                            <?= $pesanan['kode'] ?>
                                                        </h5>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end assignee -->
                                        </div> <!-- end col -->
                                        <div class="col-2">
                                            <!-- start due date -->
                                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Harga</p>
                                            <div class="d-flex">
                                                <!-- 
                                                <i class="fas fa-money-bill"></i> -->
                                                <i class="fa-solid fa-money-bill font-18 text-success me-1"></i>
                                                <div>
                                                    <h5 class="mt-1 font-14">
                                                        Rp.<?= number_format($pesanan['harga_jual'], 2, ",", "."); ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Total Harga</p>
                                            <div class="d-flex">
                                                <i class="fa-solid fa-money-bill font-18 text-success me-1"></i>
                                                <div>
                                                    <h5 class="mt-1 font-14">
                                                        Rp.<?= number_format($pesanan['total_hrg'], 2, ",", "."); ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div>
                                        <div class="col-2">
                                            <!-- start due date -->
                                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Jumlah Pesanan</p>
                                            <div class="d-flex">
                                                <i class="fa-solid fa-arrow-up-wide-short font-18 text-success me-1"></i>

                                                <div>
                                                    <h5 class="mt-1 font-14">
                                                        <?= $pesanan['jumlah'] ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Tanggal Pesanan</p>
                                            <div class="d-flex">
                                                <i class='uil uil-schedule font-18 text-success me-1'></i>

                                                <div>
                                                    <h5 class="mt-1 font-14">
                                                        <?= $pesanan['tgl'] ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <!-- end due date -->
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h5 class="mt-3">Catatan pesanan:</h5>

                                    <p class="text-muted mb-4">
                                        <?= $pesanan['cpo'] ?>
                                    </p>

                                    <!-- start sub tasks/checklists -->
                                    <h5 class="mt-4 mb-2 font-16">Detail:</h5>
                                    <div class="form-check mt-1">
                                        <label class="form-check-label strikethrough" for="checklist1">
                                            Alamat:
                                        </label>
                                        <p><?= $pesanan['alamat'] ?></p>
                                    </div>
                                    <div class="form-check mt-1">
                                        <label class="form-check-label strikethrough" for="checklist1">
                                            No HP:
                                        </label>
                                        <p><?= $pesanan['no_hp'] ?></p>
                                    </div>
                                    <div class="form-check mt-1">
                                        <label class="form-check-label strikethrough" for="checklist1">
                                            Email:
                                        </label>
                                        <p><?= $pesanan['email'] ?></p>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
            <!-- Footer Start -->
            <?php
            include '../master_tem/footer.php';
            ?>