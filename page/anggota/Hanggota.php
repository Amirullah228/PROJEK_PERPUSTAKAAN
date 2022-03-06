<?php
// ambil id dari url
$id = $_GET["id"];
// proses hapus
$delete = $conn->query("DELETE FROM anggota WHERE id_anggota = '$id'");

// kondisi
if ($delete > 0) {
    echo "<script>
    alert('Data berhasil diHapus');
    document.location.href= '?page=anggota';
    </script>";
} else {
    echo "Data gagal dihapus";
}
