<?php
include '../master_tem/header.php';
?>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php' ?>
        <!-- Left Sidebar End -->

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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Kategori</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Edit Kategori</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php $id_kg = $_GET['id_kg'];

                                    $sql    = mysqli_query($mysqli, "SELECT * FROM kategori WHERE id='$_GET[id_kg]'");
                                    $kategori    = mysqli_fetch_array($sql);
                                    ?>

                                    <form action="input_kategori.php" method="post">
                                        <div class="mb-3">
                                            <input type="text" id="id_kg" name="id_kg" class="form-control form-control-sm" value="<?= $kategori['id'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama_kg" class="form-label">Nama</label>
                                            <input type="text" id="nama_kg" name="nama_kg" class="form-control" value="<?= $kategori['nama_kg'] ?>">
                                        </div>

                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                </div>

            </div>

            <?php
            include '../master_tem/footer.php';
            ?>
            <!-- Standard modal -->