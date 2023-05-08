<?php
include '../master_tem/header.php';
?>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php' ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Toko-Surya</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Produk</h4>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = mysqli_query($mysqli, "SELECT * FROM produk, kategori WHERE produk.id_kategori = kategori.id") or die(mysqli_error($mysqli));
                    ?>

                    <div class="row">
                        <?php
                        $nomor = 1;
                        while ($produk = mysqli_fetch_array($sql)) {  ?>
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="<?php echo "../assets/images/produk/" . $produk['gambar']; ?>" width="250" height="250" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $produk['nama'] ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Rp.<?= number_format($produk['harga_jual'], 2, ",", "."); ?></h6>

                                    </div>
                                    <!-- <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul> -->
                                    <div class="card-body">
                                        <a href="detail.php?id_pd=<?php echo $produk['id_pd'] ?>" class="card-link btn btn-primary">Detai</a>
                                        <?php if ($produk['stok'] == '0') { ?>
                                            <a class="card-link btn btn-warning disabled" disabled>Belip</a>
                                        <?php } else { ?>
                                            <a href="pemesanan.php?id_pd=<?php echo $produk['id_pd'] ?>" class="card-link btn btn-warning">Beli</a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!-- end page title -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <?php
            include '../master_tem/footer.php';
            ?>