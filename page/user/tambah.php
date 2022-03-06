<?php  
if(isset($_POST["save"])) {
    // ambil data dari form
    $iduser = $_POST["id_user"];
    $user = $_POST["nama"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    // cek jika email sudah terdaftar
   $cekEmail = $conn->query("SELECT *FROM user WHERE email = '$email'");
    if($cekEmail->num_rows > 0) {
                echo "<script>alert('Email Sudah Terdaftar');
                    document.location.href= '?page=user';
                </script>";
                return false;
    }
        
        // pengecekan password jika kurang dari 5
    if(strlen($pass) < 5) {
        echo "<script>alert('Password Tidak Boleh kurang dari 5');
        document.location.href= '?page=user';
    </script>";
    return false;
    } 
    
    // set gambar
    // proses gambar
    $ekstensi_diperbolehkan = array("png", "jpg", "jpeg"); //ekstensi yang dibolehkan 
    $nama = $_FILES['gambar']['name']; //ambil file gambar
    $x = explode('.', $nama); //yang akan diupload
    $ekstensi = strtolower(end($x)); //urutkan ekstensinya
    $ukuran = $_FILES['gambar']['tmp_name']; //ambil ukuran file gambar
    $file_tmp = $_FILES['gambar']['tmp_name']; //ambil tempory

    // penamaan file -> enskripsi
    $image = md5(uniqid($nama, true). time()).'.'.$ekstensi; //menganbungkan 2 file dariyang di enksripsi dengan ekstensionya


    if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) { //kondisi
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'img/' . $image);
            $simpan = $conn->query("INSERT INTO user VALUES('$iduser','$image','$user','$email','$pass')");

            if ($simpan > 0) {
                echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href= '?page=user';
                </script>";
            } else {
                
                echo "<script>
                alert('DATA GAGAL DITAMBAHKAN');
                document.location.href= '?page=user';
                </script>";
            }
        } else {
            
            echo "<script>
            alert('UKURAN FILE TERLALU BESAR');
            document.location.href= '?page=user';
            </script>";
        }
    } else {
       
        echo "<script>
        alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DIPERBOLEHKAN');
        document.location.href= '?page=user';
        </script>";
    }

    }
