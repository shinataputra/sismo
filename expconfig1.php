<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Kueri SQL
$query = "SELECT id, nama FROM tabel";
$result = mysqli_query($conn, $query);

// Loop melalui hasil kueri
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . "<br>";
}

// Tutup koneksi
mysqli_close($conn);
?>
