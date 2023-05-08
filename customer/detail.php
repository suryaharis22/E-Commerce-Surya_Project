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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                        <li class="breadcrumb-item active">Product Details</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Product Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <?php $id_pd = $_GET['id_pd'];

                    $sql    = mysqli_query($mysqli, "SELECT * FROM produk,kategori WHERE produk.id_kategori = kategori.id AND id_pd='$id_pd'");
                    $produk    = mysqli_fetch_array($sql);
                    ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <!-- Product image -->
                                            <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                <img src="<?php echo "../assets/images/produk/" . $produk['gambar']; ?>" style="max-width: 280px;" alt="Product-img">
                                            </a>
                                        </div> <!-- end col -->
                                        <div class="col-lg-7">
                                            <form class="ps-lg-4">
                                                <!-- Product title -->
                                                <h3 class="mt-0"><?= $produk['nama'] ?> <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                <p class="mb-1"><?= $produk['nama_kg'] ?></p>
                                                <p class="font-16">
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                </p>

                                                <!-- Product stock -->
                                                <div class="mt-3">
                                                    <?php if ($produk['stok'] == '0') { ?>
                                                        <h4><span class="badge badge-danger-lighten">Not ready</span></h4>
                                                    <?php } else { ?>
                                                        <h4><span class="badge badge-success-lighten">Ready</span> : <?= $produk['stok'] ?></h4>
                                                    <?php } ?>

                                                </div>

                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Harga:</h6>
                                                    <h3> Rp.<?= number_format($produk['harga_jual'], 2, ",", "."); ?></h3>
                                                </div>


                                                <!-- Product description -->
                                                <div class="mt-4">
                                                    <h6 class="font-14">Deskripsi:</h6>
                                                    <p><?= $produk['deskripsi'] ?></p>
                                                </div>

                                                <div class="mt-4">
                                                    <div class="d-flex">
                                                        <a href="pemesanan.php?id_pd=<?php echo $produk['id_pd'] ?>" class="btn btn-danger ms-2"><i class="mdi mdi-cart me-1"></i> Pesan</a>
                                                    </div>
                                                </div>

                                            </form>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->


                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php
            include '../master_tem/footer.php';
            ?>