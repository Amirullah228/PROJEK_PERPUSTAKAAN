<?php
// tangkap id
$id = $_GET["id"];

// querykn
$sql = $conn->query("SELECT * FROM anggota WHERE id_anggota = '$id'");

// jadikan bentuk array
$t = mysqli_fetch_assoc($sql);
// ambil data untuk option terpisah
$jenis = $t["jk"];
$jr = $t["jurusan"];
$kl = $t["kls"];


?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Anggota</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" class="form-control" value="<?= $t["nim"]; ?>" name="nim" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="<?= $t["nama"]; ?>" name="nama" required>
            </div>
            <div class="form-group">
                <label>Tempat lahir</label>
                <input type="text" class="form-control" value="<?= $t["tmp_l"]; ?>" name="tempat">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" value="<?= $t["tanggal"]; ?>" name="tanggal">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jk">
                    <option value="laki-laki" <?php if ($jenis == 'laki-laki') {
                                                    echo "selected";
                                                }; ?>>laki-laki</option>
                    <option value="perempuan" <?php if ($jenis == 'perempuan') {
                                                    echo "selected";
                                                }; ?>>perempuan</option>

                </select>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="jurusan">
                    <option value="IPA" <?php if ($jr == 'IPA') {
                                            echo "selected";
                                        }; ?>>IPA</option>
                    <option value="IPS" <?php if ($jr == 'IPS') {
                                            echo "selected";
                                        }; ?>>IPS</option>

                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <select class="form-control" name="kelas">
                    <option value="X" <?php if ($kl == 'X') {
                                            echo "selected";
                                        }; ?>>X</option>
                    <option value="XI" <?php if ($kl == 'XI') {
                                            echo "selected";
                                        }; ?>>XI</option>
                    <option value="XII" <?php if ($kl == 'XII') {
                                            echo "selected";
                                        }; ?>>XII</option>

                </select>
            </div>
            <div class="form-group">
                <label>Tahun masuk</label>
                <input type="date" class="form-control" value="<?= $t["thn_m"]; ?>" name="masuk">
            </div>

            <button type="submit" name="update" class="btn-warning">Update</button>
        </div>
        <!-- /.card-body -->


        <!-- proses simpan -->

        <?php
        // ketika update di pencet
        if (isset($_POST["update"])) {
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
            $query = "UPDATE anggota SET
                        nim = '$nim',
                        nama = '$nama',
                        tmp_l = '$tempat',
                        tanggal = '$tanggal',
                        jk =    '$jk',
                        jurusan = '$jurusan',
                        kls = '$kelas',
                        thn_m = '$masuk'
                        WHERE id_anggota = $id ";

            $berhasil = mysqli_query($conn, $query) or die(mysqli_error($conn));

            // kondisi jika berhasil
            if ($berhasil > 0) {
                echo "<script>
                alert('Data berhasil diUpdate');
                document.location.href= '?page=anggota';
                </script>";
            } else {
                echo "Data gagal diUpdate! Cek Kembali";
            }
        }

        ?>