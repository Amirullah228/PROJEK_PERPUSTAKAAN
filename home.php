<?php 
include "config/koneksi.php";

// data buku
$buku = $conn->query("SELECT * FROM buku");
$cess1 = $buku->num_rows;

// data anggota
$anggota = $conn->query("SELECT * FROM anggota");
$cess2 = $anggota->num_rows;

// data transaksi
$pinjam = $conn->query("SELECT * FROM pinjam");
$cess3 = $pinjam->num_rows;

// data user
$user = $conn->query("SELECT * FROM user");
$cess4 = $user->num_rows;


?>
<style>
    .img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><?php echo date("Y-m-d") ?></li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">               
                    <span class="info-box-icon bg-info elevation-1"><i class="bi bi-book"></i></span>               
                    <div class="info-box-content">
                    <span class="info-box-text font-weight-bold">Buku</span>
                        <span class="info-box-number">
                           <h3><?= $cess1; ?></h3>                             
                        </span>
                    </div>
               
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="bi bi-people-fill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Anggota</span>
                        <h3><?= $cess2; ?></h3> 
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="bi bi-flag-fill"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Transaksi</span>
                        <h3><?= $cess3; ?></h3>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="bi bi-person-square"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Pengguna</span>
                        <h3><?= $cess4; ?></h3>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header shadow">
                <div class="img">             
                <img src="img/logo.png" width="330" height="330" >  
            </div>              
        </div>
        <!-- /.card -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->