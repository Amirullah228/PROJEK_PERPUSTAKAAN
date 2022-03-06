<?php 
require "config/koneksi.php";
?>
<html>
<head>
  <title><h2>Perpustakaan Offical</h2>
		<h4>Tabel Peminjaman</h4></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<style>
    h2, h4 {
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: center;
    }
</style>
<body>
<div class="container">
			<h2>Perpustakaan Offical</h2>
			<h4>Tabel Peminjaman</h4>
				<div class="data-tables datatable-dark">
					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
        <table id="pinjam" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $query = $conn->query("SELECT * FROM pinjam,buku,anggota WHERE 
                pinjam.idpinjam=anggota.nama AND 
                pinjam.bukunya=buku.judul_buku 
                ");
               

                while ($data =  $query->fetch_assoc()) {
                  
                ?>
                    <tr>
                        <td><?php echo $data["bukunya"]; ?></td>
                        <td><?php echo $data["idpinjam"]; ?></td>
                        <td><?php echo $data["tgl_p"]; ?></td>
                        <td><?php echo $data["tgl_k"]; ?></td>
                        <td><?php echo $data["status"]; ?></td>
                        
                        
                <?php } ?>
                </td>
                    </tr>

                    </tbody>
            </table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#pinjam').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>