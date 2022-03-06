<?php include "function.php"; ?>
<div class="card">
    <h3 class="card-title ml-auto font-italic">Halaman Denda</h3>
    <div class="card-header">       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Peminjam</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $query = $conn->query("SELECT * FROM pinjam 
                ");
                $no=1;

                while ($data =  $query->fetch_assoc()) {
                    $idpinjam = $data["id_pinjam"];                  
                    $peminjam = $data['idpinjam'];
                    $status = $data['status'];                   
                    $waktuminjam = $data['tgl_k'];                   
                    
                  
                ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $peminjam; ?></td>
                        <td><?= $status; ?></td>                        
                        <td>
                            <?php 
                            // kondisi jika terlambat
                            $denda = 1000;
                            $tgl_dateline = $waktuminjam;
                            $tgl_kembali = date("Y-m-d");

                            $lambat = terlambat($tgl_dateline, $tgl_kembali);
                            $denda1 = $lambat*$denda;

                            if($lambat > 0) {
                                echo "<font color='red'> $lambat Hari <br> 
                                (Rp. $denda1)</font>";
                            } else {
                                echo "$lambat.Hari";
                            } ?>
                        </td>
                        <!-- aksi -->
                        <td>
                            <a href="?page=delete&kode=<?= $idpinjam; ?>" class=" btn btn-danger p-2" onclick="return confirm('Apakah anda yakin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
     

                            
                    <?php } ?>
                    </tbody>
            </table>

    </div>
</div>

