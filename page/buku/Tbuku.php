<?php

// ketika tombol TambahB dipencet
if (isset($_POST["simpan"])) {
       
    // ambil data dari form
    $judul = htmlspecialchars($_POST["buku"]);
    $pengarang = htmlspecialchars($_POST["pengarang"]);
    $penerbit = htmlspecialchars($_POST["penerbit"]);
    $stock = htmlspecialchars($_POST["stock"]);
    $th_terbit = htmlspecialchars($_POST["th"]);
    $isbn = htmlspecialchars($_POST["isbn"]);
    $jmlh = htmlspecialchars($_POST["jmlh"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $input = htmlspecialchars($_POST["input"]);

    // proses simpan
    $simpan = "INSERT INTO buku VALUES(null,'$judul','$pengarang','$penerbit', '$stock','$th_terbit','$isbn','$jmlh','$lokasi','$input')";

    $query =  mysqli_query($conn, $simpan);

    // kondisi jika ad data yang masuk
    if ($query > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href= '?page=buku';
        </script>";
    } else {
        echo "Data gagal ditambahkan";
    }
}
