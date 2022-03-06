<?php
session_start();

include "config/koneksi.php"; //koneksi kedb

// jika user sudah login
if(isset($_SESSION["login"])) {
    header("location: index.php");
}

// jika tombol simpan dipencet
if (isset($_POST["login"])) {
    // ambil data dari form
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $cekdb = $conn->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    // jadikan query

    // jika password atau username ada
    if(mysqli_num_rows($cekdb) > 0){
    
    $_SESSION["login"] = true;
    $row = mysqli_fetch_array($cekdb);
    $_SESSION["login"] = $row["email"];
    $_SESSION["nama"] = $row["nama"];
    $_SESSION["foto"] = $row["foto"];


    // jika berhasil    
    header("location: index.php");  
        
    } else { 
        echo "<script>
        alert('Gagal Login!');
        document.location.href= 'login.php';
        </script>";      
      
    }
    
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        body {
            background: url(img/background.jpg);
            opacity: 0.9;
        }

        .card {
            box-shadow: 2px 2px 5px #333;
        }
    </style>
</head>

<body class="hold-transition login-page bg-gradient">
    <div class="login-box">
        <div class="login-logo mb-2 ">
            <img src="img/logo.png" alt="logo" width="200" height="200">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg font-weight-bold note-fontsize-14">SILAHKAN LOGIN</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="cek" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>                    
                    <div class="row mt-4">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

            
                <p class="mt-4 text-center">
                    <span class="font-weight-bold font-italic">Wellcom To Perpustakaan Offical</span>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- script tampil pasword -->

    <!-- scritp tampil passsword onclick="tampilkan();" -->
    <!-- <script>
        function tampilkan() {
            let x = document.getElementById("cek");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script> -->
</body>

</html>