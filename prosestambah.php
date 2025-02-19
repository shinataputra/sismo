<?php
include 'config.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nopol = $_POST['nopol'];
$type_motor = $_POST['type_motor'];
$paket_service = $_POST['paket_service'];
$keluhan = $_POST['keluhan'];

$query = "INSERT INTO pendaftaran (nama, alamat, nopol, type_motor, paket_service, keluhan) VALUES ('$nama', '$alamat', '$nopol', '$type_motor', '$paket_service', '$keluhan')";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
