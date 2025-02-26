<?php
include 'config.php';

// Cek apakah ada parameter ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// Ambil data dari database
$query = "SELECT * FROM pendaftaran WHERE id_pendaftaran = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
    <style>
        form {
            margin-left: 30px;
        }

        label {
            width: 100px;
            display: block;
        }

        input,
        select {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Edit Data Pendaftaran</h1>
    <form action="prosesedit.php" method="post">
        <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required>

        <label for="nopol">Nopol:</label>
        <input type="text" id="nopol" name="nopol" value="<?= $data['nopol']; ?>" required>

        <label for="type_motor">Type Motor:</label>
        <input type="text" id="type_motor" name="type_motor" value="<?= $data['type_motor']; ?>" required>

        <label for="paket_service">Paket Service:</label>
        <select id="paket_service" name="paket_service" onchange="updateHargaService()" required>
            <option value="service_ringan" <?= ($data['paket_service'] == 'service_ringan') ? 'selected' : ''; ?>>Service Ringan - 75rb</option>
            <option value="service_berat" <?= ($data['paket_service'] == 'service_berat') ? 'selected' : ''; ?>>Service Berat - 150rb</option>
            <option value="ganti_oli" <?= ($data['paket_service'] == 'ganti_oli') ? 'selected' : ''; ?>>Ganti Oli - 50rb</option>
        </select>

        <input type="hidden" id="harga_service" name="harga_service" value="<?= $data['harga_service']; ?>">

        <label for="keluhan">Keluhan:</label>
        <input type="text" id="keluhan" name="keluhan" value="<?= $data['keluhan']; ?>" required>

        <input type="submit" value="Simpan Perubahan">
    </form>

    <script>
        function updateHargaService() {
            var paketService = document.getElementById('paket_service').value;
            var hargaService = 0;

            if (paketService === 'service_ringan') {
                hargaService = 75000;
            } else if (paketService === 'service_berat') {
                hargaService = 150000;
            } else if (paketService === 'ganti_oli') {
                hargaService = 50000;
            }

            document.getElementById('harga_service').value = hargaService;
        }
    </script>

</body>

</html>