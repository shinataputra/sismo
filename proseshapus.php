<?php

include 'koneksi.php';

$id = $_GET['id'];

// Query untuk mengambil data dari database
$query = "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row["nama"];
    $alamat = $row["alamat"];
    $nopol = $row["nopol"];
    $type_motor = $row["type_motor"];
    $paket_service = $row["paket_service"];
    $keluhan = $row["keluhan"];
} else {
    echo "Tidak ada data pendaftaran.";
}

mysqli_close($conn);
