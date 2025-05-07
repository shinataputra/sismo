<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pendaftaran</title>
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #222;
        }

        .add-button {
            text-align: right;
            margin: 20px 0;
        }

        .add-button a {
            background-color: #0069d9;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .add-button a:hover {
            background-color: #004b9d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 14px 18px;
            text-align: left;
            border: 1.5px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .action-button {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .action-button a {
            padding: 6px 12px;
            margin: 0;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
        }

        .edit {
            background-color: #007bff;
        }

        .edit:hover {
            background-color: #0056b3;
        }

        .hapus {
            background-color: #dc3545;
        }

        .hapus:hover {
            background-color: #a71d2a;
        }

        .bayar {
            background-color: #28a745;
        }

        .bayar:hover {
            background-color: #1c7d32;
        }
    </style>
</head>

<body>

    <h1>Data Pendaftaran</h1>
    <div class="add-button">
        <a href="halamantambah.php">+ Tambah Data</a>
        <a href="riwayat.php" style="margin-left: 10px; background-color: #007bff;">Riwayat Service</a>
    </div>

    <?php
    include 'config.php';

    $query = "SELECT * FROM pendaftaran";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nopol</th>
              <th>Type Motor</th>
              <th>Paket Service</th>
              <th>Keluhan</th>
              <th width='160'>Aksi</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nopol"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["type_motor"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["paket_service"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["keluhan"]) . "</td>";
            echo "<td class='action-button'>
                  <a href='halamanedit.php?id=" . $row["id_pendaftaran"] . "' class='edit'>Edit</a>
                  <a href='#' onclick='confirmDelete(" . $row["id_pendaftaran"] . ")' class='hapus'>Hapus</a>
                  <a href='prosesbayar.php?id=" . $row["id_pendaftaran"] . "' class='bayar'>Bayar</a>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data pendaftaran.";
    }

    mysqli_close($conn);
    ?>

    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = `proseshapus.php?id=${id}`;
            }
        }
    </script>

</body>

</html>