<?php

$host = 'localhost';
$dbname = 'lsp-krs';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    dir("Koneksi Gagal" . mysqli_connect_error());
}
