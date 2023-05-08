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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Kategori</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Basic Data Table</h4>
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#standard-modal">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>


                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="basic-datatable-preview">
                                            <?php
                                            $result = mysqli_query($mysqli, "SELECT * FROM kategori ORDER BY id DESC");
                                            ?>
                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $nomor = 1;
                                                    while ($kategori = mysqli_fetch_array($result)) {  ?>
                                                        <tr>
                                                            <td><?php echo $nomor++; ?></td>
                                                            <td><?= $kategori['nama_kg'] ?></td>
                                                            <td>
                                                                <a href="edit_kg.php?id_kg=<?php echo $kategori['id'] ?>" class="btn btn-primary">edit</a>
                                                                <a href="input_kategori.php?id_kg=<?php echo $kategori['id'] ?>" class="btn btn-danger">hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end preview-->

                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>


                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Button trigger modal -->



            <?php
            include '../master_tem/footer.php';
            ?>
            <!-- Standard modal -->

            <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="standard-modalLabel">Input Kategori</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <form action="input_kategori.php" method="post">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="nama_kg" class="form-label">Nama Kategori</label>
                                    <input type="text" id="nama_kg" name="nama_kg" class="form-control form-control-sm" placeholder="">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->