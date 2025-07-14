<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Servis Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .note {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Formulir Pendaftaran Servis Motor</h1>
        <form action="prosestambah.php" method="post">
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" id="nama" name="nama" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><input type="text" id="alamat" name="alamat" required></td>
                </tr>
                <tr>
                    <td><label for="nopol">No. Polisi</label></td>
                    <td><input type="text" id="nopol" name="nopol" required></td>
                </tr>
                <tr>
                    <td><label for="type_motor">Tipe Motor</label></td>
                    <td><input type="text" id="type_motor" name="type_motor" required></td>
                </tr>
                <tr>
                    <td><label for="paket_service">Paket Servis</label></td>
                    <td>
                        <select id="paket_service" name="paket_service" required onchange="updateHargaService()">
                            <option value="">-- Pilih Paket --</option>
                            <option value="service_ringan">Service Ringan - Rp75.000</option>
                            <option value="service_berat">Service Berat - Rp150.000</option>
                            <option value="ganti_oli">Ganti Oli - Rp50.000</option>
                        </select>
                        <p class="note">Harga akan disesuaikan otomatis</p>
                    </td>
                </tr>
                <tr>
                    <td><label for="keluhan">Keluhan</label></td>
                    <td><input type="text" id="keluhan" name="keluhan" required></td>
                </tr>
            </table>

            <!-- Harga service disimpan secara tersembunyi -->
            <input type="hidden" id="harga_service" name="harga_service" value="0">

            <input type="submit" value="Daftar Servis">
        </form>
    </div>

    <script>
        function updateHargaService() {
            var paket = document.getElementById('paket_service').value;
            var harga = 0;

            switch (paket) {
                case 'service_ringan':
                    harga = 75000;
                    break;
                case 'service_berat':
                    harga = 150000;
                    break;
                case 'ganti_oli':
                    harga = 50000;
                    break;
            }

            document.getElementById('harga_service').value = harga;
        }

        // Set default saat halaman dibuka
        window.onload = updateHargaService;
    </script>
</body>

</html>