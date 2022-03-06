<?php

// ketika tombol TambahB dipencet
if (isset($_POST["simpan"])) {

    // ambil data dari form
    $nim = htmlspecialchars($_POST["nim"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $tempat = htmlspecialchars($_POST["tempat"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $jk = htmlspecialchars($_POST["jk"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);
    $kelas = htmlspecialchars($_POST["kelas"]);
    $masuk = htmlspecialchars($_POST["masuk"]);

    // proses simpan
    $simpan = "INSERT INTO anggota VALUES(null,'$nim','$nama','$tempat','$tanggal','$jk','$jurusan','$kelas','$masuk')";

    $query =  mysqli_query($conn, $simpan);

    // kondisi jika ad data yang masuk
    if ($query > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href= '?page=anggota';
        </script>";
    } else {
        echo "Data gagal ditambahkan";
    }
}
