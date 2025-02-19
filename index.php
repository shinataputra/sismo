<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-button {
            display: block;
            text-align: right;
            margin-bottom: 10px;
            padding-bottom: 10px;

        }

        .add-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .add-button a:hover {
            background-color: #45a049;
        }

        .action-button a {
            background-color: #4CAF50;
            color: white;
            padding: 2px 5px;
            text-decoration: none;
            border-radius: 4px;
            margin: 2px;
        }

        .action-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Data Pendaftaran</h1>
    <div class="add-button">
        <a href="tambahdata.php">Tambah Data</a>
    </div>
    <?php
    include 'config.php';

    // Query untuk mengambil data dari database
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
                <th width='120'>Aksi</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td>" . $row["nopol"] . "</td>";
            echo "<td>" . $row["type_motor"] . "</td>";
            echo "<td>" . $row["paket_service"] . "</td>";
            echo "<td>" . $row["keluhan"] . "</td>";
            echo "<td class='action-button'>
                    <a href='editdata.php?id=" . $row["id_pendaftaran"] . "'>Edit</a>
                    <a href='#' onclick='confirmDelete(" . $row["id_pendaftaran"] . ")'>Hapus</a>
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