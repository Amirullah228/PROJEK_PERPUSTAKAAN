<?php 
$id = $_GET["kode"]; //ambil id dari url

// proses hapus gambar dari folder 
$gambar = $conn->query("SELECT * FROM user WHERE id_user = '$id'");
$query = mysqli_fetch_array($gambar);
$img = 'img/'.$query["foto"];
unlink($img);

// proses hapus
$hapususer = $conn->query("DELETE FROM user WHERE id_user = '$id'");

// validasi
if($hapususer > 0) {
    echo "<script>
         alert('Berhasil dihapus');
         document.location.href= '?page=user';
         </script>";
 } else {
    echo "gagal";
 }