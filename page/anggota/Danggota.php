<?php
// tangkap id
$id = $_GET['id'];
// tampilkan
$sql = $conn->query("SELECT * FROM anggota WHERE id_anggota =  '$id'");
// jadikan array
$m = mysqli_fetch_assoc($sql);

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
                Detail Data Anggota
            </h3>
        </div>
        <div class="card-body">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <ul class="list">
                        <li>NIM : <?= $m["nim"]; ?></li>
                        <li>Nama : <?= $m["nama"]; ?></li>
                        <li>Tempat Lahir : <?= $m["tmp_l"]; ?></li>
                        <li>Tanggal Lahir : <?= $m["tanggal"]; ?></li>
                        <li>Jenis Kelamin : <?= $m["jk"]; ?></li>
                        <li>Jurusan : <?= $m["jurusan"]; ?></li>
                        <li>Kelas : <?= $m["kls"]; ?></li>
                        <li>Tahun Masuk : <?= $m["thn_m"]; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>