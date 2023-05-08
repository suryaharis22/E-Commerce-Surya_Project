<?php
include_once("koneksi.php");

// Check If form submitted, insert form data into users table.
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $id_kg = $_POST['id_kg'];
    $generet = random_bytes(4);
    $token = (bin2hex($generet));
    $kode = str_replace(' ', '', $token);
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../assets/images/produk/';

    move_uploaded_file($source, $folder . $nama_file);


    $result = mysqli_query($mysqli, "INSERT INTO produk(nama,id_kategori,kode,harga_jual,harga_beli,stok,deskripsi,gambar) VALUES('$nama','$id_kg','$kode','$harga_jual','$harga_beli','$stok','$deskripsi','$nama_file')");

    echo '<script language="javascript">
                                alert ("Berhasil Input Data produk");
                                window.location="produk.php";
                                </script>';
} else {
    echo '<script language="javascript">
                                    alert ("Gagal");
                                    window.location="produk.php"";
                                    </script>';
}

if (isset($_POST['update'])) {
    $id_pd = $_POST['id_pd'];
    $nama = $_POST['nama'];
    $id_kg = $_POST['id_kg'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $lm_gambar = $_POST['lm_gambar'];

    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../assets/images/produk/';





    if (empty($nama)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Mohon Isi Semua');
    window.location.href='produk.php';
    </script>");
    } else {

        if (empty($nama_file)) {
            // update user data
            $result = mysqli_query($mysqli, "UPDATE produk SET nama='$nama',id_kategori='$id_kg',harga_jual='$harga_jual',harga_beli='$harga_beli',stok='$stok',deskripsi='$deskripsi' WHERE id_pd=$id_pd");
            // Redirect to homepage to display updated user in list
            header("Location: produk.php");
        } else {
            // var_dump($nama_file);
            // die;
            // update user data
            unlink($folder . $lm_gambar);
            move_uploaded_file($source, $folder . $nama_file);
            $result = mysqli_query($mysqli, "UPDATE produk SET nama='$nama',id_kategori='$id_kg',harga_jual='$harga_jual',harga_beli='$harga_beli',stok='$stok',deskripsi='$deskripsi', gambar='$nama_file' WHERE id_pd=$id_pd");
            // Redirect to homepage to display updated user in list
            header("Location: produk.php");
        }
    }
}



// Get id from URL to delete that user
$id_pd = $_GET['id_pd'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE id_pd=$id_pd");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:produk.php");
