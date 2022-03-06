<?php
// tangkap id
$id = $_GET['id'];
// tampilkan
$sql = $conn->query("SELECT * FROM buku WHERE id =  '$id'");
// jadikan array
$t = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Detail</title>
    <style>
        .list li {
            padding: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="card card-row card-primary">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                Detail Data Buku
            </h3>
        </div>
        <div class="card-body">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <ul class="list">
                        <li>Judul Buku : <?= $t["judul_buku"]; ?></li>
                        <li>Pengarang : <?= $t["pengarang"]; ?></li>
                        <li>Penerbit : <?= $t["penerbit"]; ?></li>
                        <li>Stock : <?= $t["stok"]; ?></li>
                        <li>Tahun Terbit : <?= $t["th_terbit"]; ?></li>
                        <li>ISBN : <?= $t["isbn"]; ?></li>
                        <li>Jumlah Buku : <?= $t["jml_buku"]; ?></li>
                        <li>Lokasi : <?= $t["lokasi"]; ?></li>
                        <li>Tanggal Input : <?= $t["tgl_input"]; ?></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>