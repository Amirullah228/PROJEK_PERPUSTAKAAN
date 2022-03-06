
<div class="card">
    <h3 class="card-title ml-auto font-italic">Halaman Data Peminjaman</h3>
    <div class="card-header">
        <a href="?page=Tpinjam">
            <button class="btn btn-primary">Input Data</button>
        </a>
        <a href="exportP.php" target="_blank">
            <button class="btn btn-success">Export Data</button>
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Buku</th>
                    <th>Peminjam</th>
                    <th>Tanggal_p</th>
                    <th>Tanggal_k</th>
                    <th>status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- ambil semua tabel yang ingin kita join, kemudian kita lakukan
            join denga cara ambil data dari tb_peminjam yang tidak sama dengan tabel
        yang ingin kita join
    contoh tb_peminjam.nama colum.buku..nah buku ini kita join dengan judul buku yang ad di tb_buku..dan terus selanjutnya -->
                <?php
                $query = $conn->query("SELECT * FROM pinjam,buku,anggota WHERE 
                pinjam.idpinjam=anggota.nama AND 
                pinjam.bukunya=buku.judul_buku 
                ");
               

                while ($data =  $query->fetch_assoc()) {
                    $idp = $data['id_pinjam'];
                    $idb = $data['id'];                   
                    $judul = $data['judul_buku'];
                    $nama = $data['nama'];
                    $tgp = $data['tgl_p'];
                    $tgk = $data['tgl_k'];
                    $stt = $data['status'];
                  
                ?>
                    <tr>
                        <td><?= $judul; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $tgp; ?></td>
                        <td><?= $tgk; ?></td>
                        <td><?= $stt ; ?></td>
                        <td>
                            <!-- Button to Open the Modal -->
                
                <!-- Button to Open the Modal -->
                <?php if($stt == "Dipinjam") { ?>
                    <a href="?page=selesai&kode=<?php echo $data['id_pinjam'];?>&idbuku=<?php echo $data['id'];?>">                          
                    <button class="btn btn-success" onclick="return confirm('Apa anda ingin mengembalikan buku? ');">Kembalikan</button>
                    </a>
                <?php } ?>
                </td>
                    </tr>
     

                            
                    <?php } ?>
                    </tbody>
            </table>

    </div>
</div>

