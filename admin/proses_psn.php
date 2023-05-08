<?php

include_once("koneksi.php");

//mengambil id pesanan dan id produk dari query string
$id_pesanan = $_GET['id'];
$id_produk = $_GET['id_pd'];

//mengambil jumlah stok dari tabel produk
$query_stok = "SELECT stok FROM produk WHERE id_pd = $id_produk";
$result_stok = mysqli_query($mysqli, $query_stok);
$stok = mysqli_fetch_assoc($result_stok)['stok'];

$query_jumlah = "SELECT jumlah FROM pesanan WHERE id = $id_pesanan";
$result_jumlah = mysqli_query($mysqli, $query_jumlah);
$jumlah = mysqli_fetch_assoc($result_jumlah)['jumlah'];

//mengupdate stok barang di tabel produk
$query_update_stok = "UPDATE produk SET stok = " . ($stok + $jumlah) . " WHERE id_pd = $id_produk";
mysqli_query($mysqli, $query_update_stok);

//menghapus pesanan dari tabel pesanan
$query_hapus_pesanan = "DELETE FROM pesanan WHERE id = $id_pesanan";
mysqli_query($mysqli, $query_hapus_pesanan);

header("Location:pesanan.php");
