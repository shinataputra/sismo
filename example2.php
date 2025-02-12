<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
</head>

<body>
    <h1>Data Pendaftaran</h1>
    <?php
    include 'config.php';

    // Query untuk mengambil data dari database
    $query = "SELECT * FROM pendaftaran";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Paket Service</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td>" . $row["paket_service"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data pendaftaran.";
    }

    mysqli_close($conn);
    ?>
</body>

</html>