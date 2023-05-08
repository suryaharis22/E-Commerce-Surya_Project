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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Toko Surya</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data Pesanan</a></li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Data Pesanan</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="basic-datatable-preview">
                                            <?php
                                            $sql = mysqli_query($mysqli, "SELECT * FROM pesanan, produk WHERE produk.id_pd = pesanan.id_pd") or die(mysqli_error($mysqli));
                                            ?>
                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode TRX</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Pemesan</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga-Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Total</th>
                                                        <th>Gambar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                    $nomor = 1;
                                                    while ($pesanan = mysqli_fetch_array($sql)) {  ?>
                                                        <tr>
                                                            <td><?php echo $nomor++; ?></td>
                                                            <td><?= $pesanan['id'] ?></td>
                                                            <td><?= $pesanan['kode'] ?></td>
                                                            <td><?= $pesanan['nama_psn'] ?></td>
                                                            <td><?= $pesanan['nama'] ?></td>
                                                            <td>Rp.<?= number_format($pesanan['harga_jual'], 2, ",", "."); ?></td>
                                                            <td><?= $pesanan['jumlah'] ?></td>
                                                            <td>Rp.<?= number_format($pesanan['total_hrg'], 2, ",", "."); ?></td>
                                                            <td align="center"><img src="<?php echo "../assets/images/produk/" . $pesanan['gambar']; ?>" alt="" style="width: 50px; "></td>
                                                            <td>
                                                                <a href="detail_psn.php?id=<?php echo $pesanan['id'] ?>" class="btn btn-warning">Detail</a>
                                                                <a href="proses_psn.php?id=<?php echo $pesanan['id'] ?>&id_pd=<?php echo $pesanan['id_pd'] ?>" class="btn btn-danger">Hapus</a>

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

            <?php
            include '../master_tem/footer.php';
            ?>

            <!-- Standard modal -->

            <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="standard-modalLabel">Input Produk</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <form action="input_produk.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Produk</label>
                                    <input type="text" id="nama" name="nama" class="form-control form-control-sm" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="id_kg" class="form-label">Kategori</label>
                                    <select class="form-select" id="id_kg" name="id_kg" aria-label="Floating label select example">
                                        <option selected>Open this select menu</option>
                                        <?php
                                        $kg = mysqli_query($mysqli, "SELECT * FROM kategori") or die(mysqli_error($mysqli));

                                        while ($kategori = mysqli_fetch_array($kg)) {
                                            echo "<option value=$kategori[id]>$kategori[nama_kg]</option>";
                                        } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="harga_jual" class="form-label">Harga Jual</label>
                                    <input type="number" id="harga_jual" name="harga_jual" class="form-control form-control-sm" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="harga_beli" class="form-label">Harga beli</label>
                                    <input type="number" id="harga_beli" name="harga_beli" class="form-control form-control-sm" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control form-control-sm" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control form-control-sm" id="deskripsi" name="deskripsi" style="height: 100px;"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" id="gambar" name="gambar" class="form-control form-control-sm">
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