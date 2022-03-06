<div class="card">
    <h3 class="card-title ml-auto font-italic">Halaman Data Anggota</h3>
    <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Input Data</button>
        <a href="exportA.php" target="_blank">
            <button class="btn btn-secondary">Export Data</button>
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = $conn->query("SELECT * FROM anggota");

                while ($data = $sql->fetch_assoc()) {

                ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data["nim"]; ?></td>
                        <td><?= $data["nama"]; ?></td>
                        <td><?= $data["jurusan"]; ?></td>
                        <td>
                            <a href="?page=D_anggota&id=<?= $data['id_anggota']; ?>">
                                <button class="btn btn-warning">Detail</button>
                            </a>
                            <a href="?page=E_anggota&id=<?= $data['id_anggota']; ?>">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <a href="?page=Hanggota&id=<?= $data['id_anggota']; ?>" onclick="return confirm('Apa anda yakin ingin menghapus?');">
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
            <div class="modal-header bg-success">
                <h4 class="modal-title">Form Tambah Data Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- -----//////////////// FORM ///////////////////------------- -->

                <!-- form -->
                <form method="POST" action="?page=T_anggota">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIM</label>
                            <input type="text" class="form-control" name="nim" autofocus required maxlength="7">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option>--Pilih--</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jurusan</label>
                            <select name="jurusan" class="form-control">
                                <option>--Pilih--</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kelas</label>
                            <select name="kelas" class="form-control">
                                <option>--Pilih--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun Masuk</label>
                            <input type="date" class="form-control" name="masuk">
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