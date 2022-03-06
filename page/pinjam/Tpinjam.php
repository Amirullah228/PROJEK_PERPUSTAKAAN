<?php
// set tanggal kembali
$tanggalpinjam = date("d-m-Y");
$tujuhhari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$kembali = date("d-m-Y", $tujuhhari);

// ambil id buku
$sql = $conn->query("SELECT * FROM buku");
$ambil = mysqli_fetch_array($sql);
$idny = $ambil['id'];


?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Halaman Tambah Data Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $idny; ?>">
        <div class="card-body">
            <div class="form-group">
                <label>Judul Buku</label>
                <select name="buku" class="form-control">
                    <option>--Pilih Peminjam--</option>
                    <?php
                     $sql = $conn->query("SELECT * FROM buku");

                     while ($data = $sql->fetch_assoc()) {
                        echo "<option value='$data[id].$data[judul_buku]'> $data[judul_buku]</option>"; 
                     }
                     ?>
                </select>
            </div>
            <div class="form-group">
                <label>Peminjam</label>
                <select name="pinjam" class="form-control">
                    <option>--Pilih Peminjam--</option>
                    <?php
                    // cara kedua
                    $sql = $conn->query("SELECT * FROM anggota");

                    while ($data = $sql->fetch_assoc()) {
                        echo "<option value='$data[nama]'> $data[nama]</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="text" class="form-control" name="tglpinjam" value="<?= $tanggalpinjam; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="text" class="form-control" name="tglkembali" value="<?= $kembali; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Jumlah Pinjam</label>
                <input type="number" class="form-control" name="jml">
            </div>

            <button type="submit" name="simpan" class="btn-warning">simpan</button>
        </div>
        <!-- /.card-body -->

        <!-- proses simpan data-->
        <?php
        if (isset($_POST['simpan'])) {
            // ambil data dari form

            // pecahkan buku
            $ambilbuku = $_POST["buku"];
            $pecahbuku = explode(".", $ambilbuku);
            $idbuku = $pecahbuku[0];
            $namabukunya = $pecahbuku[1];

            $ambilpinjam = $_POST["pinjam"];
            $tglpinjam = $_POST["tglpinjam"];
            $tglkembali = $_POST["tglkembali"];
            $jml = $_POST["jml"];

            // pengecekan stok jika habis / 
            // ambil stok buku 
            $sql1 = $conn->query("SELECT * FROM buku WHERE id = '$idbuku'");           
            $arraykan = mysqli_fetch_array($sql1);
            $stok = $arraykan["stok"];
            
            // kasi kondisi jika stok kosong
            if($stok <= $jml) {
               
                echo "<script>
                alert('Ooops...Jumlah pengeluaran harus besar dari Stok.. ');
                document.location.href= '?page=pinjam';
                </script>";
               
            } else {
               
                // proses simpan
                $sql = "INSERT INTO pinjam(idbuku,bukunya, idpinjam, tgl_p, tgl_k,stok)
                VALUES(' $idbuku','$namabukunya','$ambilpinjam','$tglpinjam','$tglkembali','$jml')";
                    // querykn
                $masuk = mysqli_query($conn, $sql)or die($conn);
                    //    jika berhasil masuk
                if($masuk > 0) {
                    echo "<script>
                    alert('Berhasil');
                    document.location.href= '?page=pinjam';
                    </script>";
                } else {
                    echo "Gagal";
            }
    
 }
          
           
            
       
          
          
          }
       


        ?>