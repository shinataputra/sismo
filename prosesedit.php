<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_pendaftaran'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nopol = $_POST['nopol'];
    $type_motor = $_POST['type_motor'];
    $paket_service = $_POST['paket_service'];
    $harga_service = $_POST['harga_service'];
    $keluhan = $_POST['keluhan'];

    $query = "UPDATE pendaftaran SET 
                nama='$nama', 
                alamat='$alamat', 
                nopol='$nopol', 
                type_motor='$type_motor', 
                paket_service='$paket_service', 
                harga_service='$harga_service', 
                keluhan='$keluhan' 
              WHERE id_pendaftaran=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
