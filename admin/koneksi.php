<?php

/**
 * using mysqli_connect for database connection
 */
$databaseHost = 'localhost';
$databaseName = 'toko_surya';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


if ($mysqli->connect_error) {
    die("Koneksi gagal");
}
