<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data di tabel pembayaran yang berhubungan dengan id_pendaftaran
    $query_pembayaran = "DELETE FROM pembayaran WHERE id_pendaftaran = $id";
    mysqli_query($conn, $query_pembayaran);

    // Setelah menghapus data di tabel pembayaran, hapus data di tabel pendaftaran
    $query_pendaftaran = "DELETE FROM pendaftaran WHERE id_pendaftaran = $id";
    $result = mysqli_query($conn, $query_pendaftaran);

    if ($result) {
        // Penghapusan berhasil, kembali ke halaman index.php
        header("Location: index.php");
    } else {
        // Penghapusan gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika tidak ada ID yang diberikan, kembali ke halaman index.php
    header("Location: index.php");
}

mysqli_close($conn);
