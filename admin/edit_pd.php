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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Produk</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Produk</a></li>
                                        <li class="breadcrumb-item active">Data Tables</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Produk</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php $id_pd = $_GET['id_pd'];
                                    // $sql    = mysqli_query($mysqli, "SELECT * FROM produk WHERE id='$_GET[id_pd]'"); SELECT * FROM produk, kategori WHERE produk.id_kategori = kategori.id
                                    $sql    = mysqli_query($mysqli, "SELECT * FROM produk,kategori WHERE produk.id_kategori = kategori.id AND id_pd='$id_pd'");
                                    $produk    = mysqli_fetch_array($sql);
                                    ?>

                                    <form action="input_produk.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="hidden" id="id_pd" name="id_pd" class="form-control form-control-sm" value="<?= $produk['id_pd'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" id="nama" name="nama" class="form-control" value="<?= $produk['nama'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_kg" class="form-label">Kategori</label>
                                            <select class="form-select" id="id_kg" name="id_kg" aria-label="Floating label select example">
                                                <option value="<?= $produk['id_kategori'] ?>"><?= $produk['nama_kg'] ?></option>
                                                <?php
                                                $kg = mysqli_query($mysqli, "SELECT * FROM kategori") or die(mysqli_error($mysqli));

                                                while ($kategori = mysqli_fetch_array($kg)) {
                                                    echo "<option value=$kategori[id]>$kategori[nama_kg]</option>";
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="harga_jual" class="form-label">Harga jual</label>
                                            <input type="number" id="harga_jual" name="harga_jual" class="form-control" value="<?= $produk['harga_jual'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_beli" class="form-label">Harga Beli</label>
                                            <input type="number" id="harga_beli" name="harga_beli" class="form-control" value="<?= $produk['harga_beli'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok" class="form-label">stok</label>
                                            <input type="number" id="stok" name="stok" class="form-control" value="<?= $produk['stok'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px;"><?= $produk['deskripsi'] ?></textarea>
                                        </div>

                                        <div class="mb-3 d-flex flex-row">
                                            <div class="col-md-4 ml-2">
                                                <label for="lm_gambar" class="form-label">Gambar Lama</label>
                                                <img src="../assets/images/produk/<?= $produk['gambar'] ?>" class="img-thumbnail" alt="<?= $produk['gambar'] ?>" height="10">
                                                <input type="hidden" id="lm_gambar" name="lm_gambar" class="form-control form-control-sm" value="<?= $produk['gambar'] ?>">
                                            </div>
                                            <div class="col-md-4 ml-2">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" id="gambar" name="gambar" class="form-control form-control-sm">
                                            </div>
                                        </div>

                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>

                </div>
                <!-- container -->

            </div>

            <?php
            include '../master_tem/footer.php';
            ?>
            <!-- Standard modal -->