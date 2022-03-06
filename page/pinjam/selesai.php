<?php
$idpinjam = $_GET["kode"];
$idbuku = $_GET["idbuku"];


// set status
$sql = $conn->query("UPDATE pinjam SET status='Selesai' WHERE id_pinjam = '$idpinjam'");


// ambil stok buku
$buku = $conn->query("SELECT * FROM buku WHERE id ='$idbuku'");
$stokbuku = mysqli_fetch_array($buku);
$stok1 = $stokbuku["stok"];

// ambil stok pinjam
$buku1 = $conn->query("SELECT * FROM pinjam WHERE id_pinjam='$idpinjam'");
$stokbuku1 = mysqli_fetch_array($buku1);
$stok2 = $stokbuku1["stok"];

// update tambah
$new_hasil = $stok1+$stok2;

// update stok buku
$updatestok = $conn->query("UPDATE buku SET stok='$new_hasil' WHERE id = '$idbuku'");



if ($sql&&$updatestok > 0) {
    echo "<script>
        alert('Buku berhasil dikembalikan');
        document.location.href= '?page=pinjam';
        </script>";
} else {
    echo "Gagal";
}

