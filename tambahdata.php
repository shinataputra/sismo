<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pendaftaran</title>
    <style>
        form {
            margin-left: 30px;
        }

        label {
            width: 100px;
            display: block;
        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Tambah Data Pendaftaran</h1>
    <form action="prosestambah.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required>

        <label for="nopol">Nopol:</label>
        <input type="text" id="nopol" name="nopol" required>

        <label for="type_motor">Type Motor:</label>
        <input type="text" id="type_motor" name="type_motor" required>

        <label for="paket_service">Paket Service:</label>
        <select id="paket_service" name="paket_service" required>
            <option value="Sercive Ringan">Service Ringan</option>
            <option value="Service Berat">Service Berat</option>
            <option value="Ganti Oli">Ganti Oli</option>
        </select>

        <label for="keluhan">Keluhan:</label>
        <input type="text" id="keluhan" name="keluhan" required>

        <input type="submit" value="Tambah Data">
    </form>
</body>

</html>