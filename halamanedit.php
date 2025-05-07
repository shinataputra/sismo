<?php
include 'config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM pendaftaran WHERE id_pendaftaran = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f7;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .harga-label {
            margin-bottom: 10px;
            color: #444;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1>Edit Data Pendaftaran</h1>
    <form action="prosesedit.php" method="post">
        <input type="hidden" name="id_pendaftaran" value="<?= $data['id_pendaftaran']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required>

        <label for="nopol">Nomor Polisi:</label>
        <input type="text" id="nopol" name="nopol" value="<?= htmlspecialchars($data['nopol']); ?>" required>

        <label for="type_motor">Tipe Motor:</label>
        <input type="text" id="type_motor" name="type_motor" value="<?= htmlspecialchars($data['type_motor']); ?>" required>

        <label for="paket_service">Paket Service:</label>
        <select id="paket_service" name="paket_service" onchange="updateHargaService()" required>
            <option value="service_ringan" <?= ($data['paket_service'] == 'service_ringan') ? 'selected' : ''; ?>>Service Ringan - Rp75.000</option>
            <option value="service_berat" <?= ($data['paket_service'] == 'service_berat') ? 'selected' : ''; ?>>Service Berat - Rp150.000</option>
            <option value="ganti_oli" <?= ($data['paket_service'] == 'ganti_oli') ? 'selected' : ''; ?>>Ganti Oli - Rp50.000</option>
        </select>

        <label class="harga-label">Harga Service: <span id="harga_service_display">Rp<?= number_format($data['harga_service'], 0, ',', '.'); ?></span></label>
        <input type="hidden" id="harga_service" name="harga_service" value="<?= $data['harga_service']; ?>">

        <label for="keluhan">Keluhan:</label>
        <input type="text" id="keluhan" name="keluhan" value="<?= htmlspecialchars($data['keluhan']); ?>" required>

        <input type="submit" value="Simpan Perubahan">
    </form>

    <script>
        function updateHargaService() {
            var paketService = document.getElementById('paket_service').value;
            var harga = 0;

            if (paketService === 'service_ringan') {
                harga = 75000;
            } else if (paketService === 'service_berat') {
                harga = 150000;
            } else if (paketService === 'ganti_oli') {
                harga = 50000;
            }

            document.getElementById('harga_service').value = harga;
            document.getElementById('harga_service_display').textContent = 'Rp' + harga.toLocaleString('id-ID');
        }

        // Panggil sekali saat halaman dimuat agar sinkron
        window.onload = updateHargaService;
    </script>

</body>

</html>
 