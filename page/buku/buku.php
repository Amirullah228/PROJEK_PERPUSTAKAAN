<div class="card">
    <h3 class="card-title ml-auto font-italic">Halaman Data Buku</h3>
    <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Input Data</button>
        <a href="exportB.php" target="_blank">
            <button class="btn btn-success">Export Data</button>
        </a>
    </div>
    
    <?php 
    $alert = $conn->query("SELECT * FROM buku WHERE stok < 1");

    while($st = mysqli_fetch_array($alert)) {
        $book = $st["judul_buku"];
    
    ?>
    <!-- alert -->
    <div class="alert alert-danger">
        <strong>Perhatian!</strong> Stock Buku( <?= $book; ?> )Telah Habis...
    </div>
    <?php } ?>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = $conn->query("SELECT * FROM buku");

                while ($data = $sql->fetch_assoc()) {

                ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data["judul_buku"]; ?></td>
                        <td><?= $data["pengarang"]; ?></td>
                        <td><?= $data["penerbit"]; ?></td>
                        <td><?= $data["stok"]; ?></td>
                        <td>
                            <a href="?page=D_buku&id=<?= $data['id']; ?>">
                                <button class="btn btn-warning">Detail</button>
                            </a>
                            <a href="?page=E_buku&id=<?= $data['id']; ?>">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <a href="?page=hapus&id=<?= $data['id']; ?>" onclick="return confirm('Apa anda yakin ingin menghapus?');">
                                <button class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>
</div>

<!-- -----//////////////// FORM TAMBAH DATA ///////////////////------------- -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Form Tambah Data Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- -----//////////////// FORM ///////////////////------------- -->

                <!-- form -->
                <form method="POST" action="?page=tambahbuku">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Buku</label>
                            <input type="text" class="form-control" name="buku" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="number" class="form-control" name="stock" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun Terbit</label>
                            <input type="date" class="form-control" name="th" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ISBN</label>
                            <input type="text" class="form-control" name="isbn" maxlength="7" placeholder="xxxxxxx">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Buku</label>
                            <input type="text" class="form-control" name="jmlh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Input</label>
                            <input type="date" class="form-control" name="input">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Save</button>
                    </div>
                </form>

                <!-- -----//////////////// FORM ///////////////////------------- -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<!-- -----//////////////// FORM TAMBAH DATA ///////////////////------------- -->