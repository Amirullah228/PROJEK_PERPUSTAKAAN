<?php  
// ambil id 
$idnya = $_GET["kode"];

// query hapus
$hapuspinjam = $conn->query("DELETE FROM pinjam WHERE id_pinjam ='$idnya'");

if($hapuspinjam > 0) {
   echo "<script>
        alert('Berhasil dihapuss');
        document.location.href= '?page=pinjam';
        </script>";
} else {
   echo "gagal";
}