<style>
    .zoom {
    width: 100px;
    height: 100px;
  }
  .zoom:hover {
   transform: scale(1,2);
   transition: 0.3s ease;
  }
</style>
<div class="card">
    <h3 class="card-title ml-auto font-italic">Halaman Data User</h3>
    <div class="card-header">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahuser">
            Tambah User
            </button>  
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <tr>                   
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $user  = $conn->query("SELECT * FROM user");

                while($tampil = mysqli_fetch_array($user)){ 
                      $id = $tampil["id_user"];          
                      $nama = $tampil["nama"];          
                      $email = $tampil["email"];          
                      $password = $tampil["password"]; 
                      $foto = $tampil["foto"]; 
                      
                      // jika user tidak input gambar
                      if($foto==null) {
                        // jika tidak foto
                        $img = "No photo";
                      } else {
                        // jika ada gambar
                        $img = '<img src="img/'.$foto.'" class="zoom">';
                      }
                ?>
                <tr>
                    <td><?= $img; ?></td>
                    <td><?= $nama; ?></td>
                    <td><?= $email ?></td>
                    <td><?= $password ?></td>
                    <td>
                         <!-- Button to Open the Modal -->
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id;?>">
                        <i class="bi bi-pencil-fill"></i>
                        </button> 
                        <input type="hidden" name="iduser" value="<?=$id;?>">
                        <!-- hapus -->
                       <a href="?page=hapusUser&kode=<?= $tampil['id_user']; ?>"> 
                        <button type="button" class=" btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?');"><i class="bi bi-trash-fill"></i></button>
                       </a>
                    </td>
                </tr>

              <!-- The Edit -->
              <div class="modal" id="edit<?=$id;?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Form Edit Data</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="?page=editUser" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="iduser" value="<?= $tampil['id_user']; ?>">
                          <div class="form-group">
                          <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>				
                              <label for="gambar">Foto</label> <br>
                              <input type="file"  name="gambar" value="<?= $tampil["foto"]; ?>">
                          </div>
                          <div class="form-group">
                              <label for="text">Nama</label>
                              <input type="text" class="form-control" name="nama" value="<?= $tampil["nama"]; ?>">
                          </div>
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control" name="email" value="<?= $tampil["email"]; ?>">
                          </div>
                          <div class="form-group">
                              <label for="pass">Password:</label>
                              <input type="password" class="form-control" id="cek"  name="pass" value="<?= $tampil["password"]; ?>">
                          </div>
                          <button type="submit" class="btn btn-primary mt-2" name="Edit">Simpan</button>
                      </form>
                  </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-box-arrow-in-right"></i></button>
                    </div>

                  </div>
                </div>
              </div>

                <?php } ?>
                   
            </tbody>
        </table>
    </div>
</div>


<!-- The Modal tambah -->
<div class="modal" id="tambahuser">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="?page=tambahuser" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>				
                Gambar<br>
                <input type="file"  name="gambar" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" placeholder="Enter nama" name="nama">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password"  class="form-control" placeholder="Enter password" name="pass">
            </div>
            
            <button type="submit" class="btn btn-primary" name="save">Simpan</button>
        </form>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="bi bi-box-arrow-in-right"></i></button>
      </div>

    </div>
  </div>
</div>
                                    <!-- Batas Edit data  -->




