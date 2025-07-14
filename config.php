<?php
// Create connection
$conn = new mysqli("127.0.0.1", "root", "", "dbservicemotor");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function tambah_pendaftaran($nama, $alamat, $nopol, $type_motor, $paket_service, $keluhan)
{
    global $conn; // Tambahkan ini untuk mengakses $conn di dalam fungsi
    $query = "INSERT INTO pendaftaran (nama, alamat, nopol, type_motor, paket_service, keluhan) VALUES ('$nama', '$alamat', '$nopol', '$type_motor', '$paket_service', '$keluhan')";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}
