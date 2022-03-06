<?php  
if(isset($_POST["Edit"])) {
    // ambil data dari form
    $iduser = $_POST["iduser"];
    $user = $_POST["nama"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    

    // set gambar
    // proses gambar
    $ekstensi_diperbolehkan = array("png", "jpg", "jpeg"); //ekstensi yang dibolehkan 
    $nama = $_FILES['gambar']['name']; //ambil file gambar
    $x = explode('.', $nama); //yang akan diupload
    $ekstensi = strtolower(end($x)); //urutkan ekstensinya
    $ukuran = $_FILES['gambar']['tmp_name']; //ambil ukuran file gambar
    $file_tmp = $_FILES['gambar']['tmp_name']; //ambil tempory

    // penamaan file->enkripsi mencegah nama gambar jadi double
    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi;
    // cek ekstensi yang di upload user
   
    //cek jika user tidak upload gambar    
        if($ukuran==null) {
            // jika tidak upload gambar
            $update = "UPDATE user SET             
            nama = '$user',
            email = '$email',
            password = '$pass'
            WHERE id_user = $iduser
            ";
        $berhasil = mysqli_query($conn, $update);

        if ($berhasil > 0) {
            echo "<script>
            alert('Data berhasil diUpdate');
            document.location.href= '?page=user';
            </script>";
        } else {
            echo "gagal";
        }

        } else {
            // jika ingin upload gambar
            move_uploaded_file($file_tmp, 'img/' . $image);
            $update = "UPDATE user SET 
                        foto = '$image',
                        nama = '$user',
                        email = '$email',
                        password = '$pass'
                        WHERE id_user = $iduser
                        ";
                    $berhasil = mysqli_query($conn, $update);

                    if ($berhasil > 0) {
                        echo "<script>
                        alert('Data berhasil diUpdate');
                        document.location.href= '?page=user';
                        </script>";
                    } else {
                        echo "gagal";
                    }

           
        }

    

}