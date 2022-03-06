<?php 
session_start();

?>
<style>
    .user {
        width: 50px;
        height: 50px;        
    }

</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="img/logo.png" class="brand-image img-circle elevation-3 text-black" style="opacity: .8">
      <span class="brand-text font-weight-success">Perpustakaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-2 d-flex">       
          <img src="img/<?= $_SESSION["foto"]; ?>" class="user img-circle elevation-1">       
        <div class="info">
          <a href="#" class="d-block"><span class="font-weight-bold"> Hai,</span> <?= $_SESSION["nama"]; ?></a>
        </div>
      </div>

    

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=buku" class="nav-link">
                        <i class="nav-icon bi bi-book"></i>
                        <p>
                            Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=anggota" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>
                            Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-card-checklist"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=pinjam" class="nav-link">
                                <i class="nav-icon bi bi-person"></i>
                                <p>
                                    Peminjaman
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=denda" class="nav-link">
                                <i class="bi bi-journal-check"></i>
                                <p>
                                    Denda
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="?page=user" class="nav-link">
                        <i class="nav-icon bi bi-person-plus"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon bi bi-door-closed"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>