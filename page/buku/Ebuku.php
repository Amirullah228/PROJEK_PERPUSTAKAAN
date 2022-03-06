<?php
// tangkap id
$id = $_GET["id"];

// querykn
$sql = $conn->query("SELECT * FROM buku WHERE id = '$id'");

// jadikan bentuk array
$t = mysqli_fetch_assoc($sql);


?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Buku</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" value="<?= $t["judul_buku"]; ?>" name="judul" required>
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" class="form-control" value="<?= $t["pengarang"]; ?>" name="pengarang" required>
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" class="form-control" value="<?= $t["penerbit"]; ?>" name="penerbit">
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="text" class="form-control" value="<?= $t["stok"]; ?>" name="stok">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" class="form-control" value="<?= $t["th_terbit"]; ?>" name="th_terbit">
            </div>
            <div class="form-group">
                <label>ISBN</label>
                <input type="text" class="form-control" value="<?= $t["isbn"]; ?>" name="isbn" maxlength="7">
            </div>
            <div class="form-group">
                <label>Jumlah Buku</label>
                <input type="text" class="form-control" value="<?= $t["jml_buku"]; ?>" name="jml_buku">
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" class="form-control" value="<?= $t["lokasi"]; ?>" name="lokasi">
            </div>
            <div class="form-group">
                <label>Tanggal Input</label>
                <input type="date" class="form-control" value="<?= $t["tgl_input"]; ?>" name="tgl_input">
            </div>

            <button type="submit" name="update" class="btn-warning">Update</button>
        </div>
        <!-- /.card-body -->


        <!-- proses simpan -->

        <?php
        // ketika update di pencet
        if (isset($_POST["update"])) {
            // ambil data dari form
            $judul = htmlspecialchars($_POST["judul"]);
            $pengarang = htmlspecialchars($_POST["pengarang"]);
            $penerbit = htmlspecialchars($_POST["penerbit"]);
            $stock = htmlspecialchars($_POST["stok"]);
            $th_terbit = htmlspecialchars($_POST["th_terbit"]);
            $isbn = htmlspecialchars($_POST["isbn"]);
            $jml_buku = htmlspecialchars($_POST["jml_buku"]);
            $lokasi = htmlspecialchars($_POST["lokasi"]);
            $tgl_input = htmlspecialchars($_POST["tgl_input"]);

            // proses simpan
            $query = "UPDATE buku SET
                        judul_buku = '$judul',
                        pengarang = '$pengarang',
                        penerbit = '$penerbit',
                        stok = '$stock',
                        th_terbit = '$th_terbit',
                        isbn = '$isbn',
                        jml_buku = '$jml_buku',
                        lokasi = '$lokasi',
                        tgl_input = '$tgl_input'
                        WHERE id = $id ";

            $berhasil = mysqli_query($conn, $query) or die(mysqli_error($conn));

            // kondisi jika berhasil
            if ($berhasil > 0) {
                echo "<script>
                alert('Data berhasil diUpdate');
                document.location.href= '?page=buku';
                </script>";
            } else {
                echo "Data gagal diUpdate! Cek Kembali";
            }
        }

        ?>