<?php
include "koneksi.php";


if ($_GET["page"] == "") {
    include "home.php";
} else 
    if ($_GET["page"] == "buku") { //data buku
    include "page/buku/buku.php";
} else if ($_GET["page"] == "tambahbuku") { //tambah buku
    include "page/buku/Tbuku.php";
} else if ($_GET["page"] == "D_buku") { //detail buku
    include "page/buku/Dbuku.php";
} else if ($_GET["page"] == "E_buku") { //edit buku
    include "page/buku/Ebuku.php";
} else if ($_GET["page"] == "hapus") { //hapus buku
    include "page/buku/hapus.php";
    // Batas buku
}  else 
if ($_GET["page"] == "anggota") { //data Anggota
    include "page/anggota/anggota.php";
} else if ($_GET["page"] == "T_anggota") { //tambah anggota
    include "page/anggota/Tanggota.php";
} else if ($_GET["page"] == "D_anggota") { //detail anggota
    include "page/anggota/Danggota.php";
} else if ($_GET["page"] == "E_anggota") { //edit anggota
    include "page/anggota/Eanggota.php";
} else if ($_GET["page"] == "Hanggota") { //hapus anggota
    include "page/anggota/Hanggota.php";
    // Batas anggota
} else 
if ($_GET["page"] == "pinjam") { //pinjam
    include "page/pinjam/pinjam.php";
} else if ($_GET["page"] == "Tpinjam") { //Tambah pinjam
    include "page/pinjam/Tpinjam.php";
} else if ($_GET["page"] == "selesai") { //selesai pinjam
    include "page/pinjam/selesai.php";
} else if ($_GET["page"] == "denda") { //denda pinjam
    include "page/denda/denda.php";
}
 else if ($_GET["page"] == "delete") { //delete pinjam
    include "page/denda/delete.php";
}
// Batas user 
if ($_GET["page"] == "user") { //user
    include "page/user/user.php";
} else if ($_GET["page"] == "tambahuser") { //tambah pinjam
    include "page/user/tambah.php";
} else if ($_GET["page"] == "hapusUser") { //delete pinjam
    include "page/user/hapus.php";
} else if ($_GET["page"] == "editUser") { //edit pinjam
    include "page/user/edit.php";
}
// laporan data
else if ($_GET["page"] == "laporan") { //edit pinjam
    include "page/laporan/lapor.php";
}
