<?php
// ambil id dari url
$id = $_GET["id"];
// proses hapus
$hapus = $conn->query("DELETE FROM buku WHERE id = '$id'");

// kondisi
if ($hapus > 0) {
    echo "<script>
    alert('Data berhasil diHapus');
    document.location.href= '?page=buku';
    </script>";
} else {
    echo "Data gagal dihapus";
}
