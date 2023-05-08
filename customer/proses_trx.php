<?php
include_once("../admin/koneksi.php");

// Check If form submitted, insert form data into users table.
if (isset($_POST['submit'])) {
    $nama_psn = $_POST['nama_psn'];
    $id_pd = $_POST['id_pd'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $cpo = $_POST['cpo'];
    $tgl = $_POST['tgl'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $apd_stok = $stok - $jumlah;
    // var_dump($apd_stok);
    // die;


    $total_hrg = $jumlah * $harga_jual;



    $result = mysqli_query($mysqli, "INSERT INTO pesanan(id_pd,nama_psn,alamat,no_hp,email,jumlah,total_hrg,cpo,tgl) VALUES('$id_pd','$nama_psn','$alamat','$no_hp','$email','$jumlah','$total_hrg','$cpo','$tgl')");

    $update_stok = mysqli_query($mysqli, "UPDATE produk SET stok='$apd_stok' WHERE id_pd=$id_pd");

    echo '<script language="javascript">
                                alert ("Pesanan Berhasil");
                                window.location="index.php";
                                </script>';
} else {
    echo '<script language="javascript">
                                    alert ("Pesanan Gagal");
                                    window.location="pemesanan.php"";
                                    </script>';
}
