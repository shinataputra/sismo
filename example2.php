<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href='' onclick='confirmDelete()'>Hapus</a>
    <a href='' onclick='tespopup()'>tespopup</a>





    <script>
        function tespopup() {
            if (confirm()) {

            }
        }

        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = `proseshapus.php?id=${id}`;
            }
        }
    </script>
</body>

</html>