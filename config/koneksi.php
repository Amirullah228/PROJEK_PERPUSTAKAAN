<?php
global $conn;
$conn = mysqli_connect("localhost", "root", "", "db_perpustakaan");
if (!$conn) {
    die("Koneksi kedatabase gagal");
}
