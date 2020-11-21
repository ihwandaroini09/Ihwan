<?php
 include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
 <head>
 <title>CRUD CRUD Penjualan </title>
 <link rel="stylesheet" href="style.css">
 </head>
 <body>
 	<form class="form-inline my-2 my-lg-0"action="index.php" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" width="100px">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" formaction="cariadmin.php">Search</button>
    </form>
 	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
	?>
<center><h1>Data Produk</h1><center>
 <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
 <br/>
 <table>
 <thead>
 <tr>
 <th>No</th>
 <th>Produk</th>
 <th>Dekripsi</th>
 <th>Harga Beli</th>
 <th>Harga Jual</th>
 <th>Gambar</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 <?php
 // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
 $query = "SELECT * FROM produk ORDER BY id ASC";
 $result = mysqli_query($koneksi, $query);
 //mengecek apakah ada error ketika menjalankan query
 if(!$result){
 die ("Query Error: ".mysqli_errno($koneksi).
 " - ".mysqli_error($koneksi));
 }

 //buat perulangan untuk element tabel dari data mahasiswa
 $no = 1; //variabel untuk membuat nomor urut
 // hasil query akan disimpan dalam variabel $data dalam bentukarray
 // kemudian dicetak dengan perulangan while
 while($row = mysqli_fetch_assoc($result))
 {
 ?>
 <tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['nama_produk']; ?></td>
 <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
 <td>Rp <?php echo 
 number_format($row['harga_beli'],0,',','.'); ?></td>
 <td>Rp <?php echo $row['harga_jual']; ?></td>
 <td style="text-align: center;"><img src="gambar/<?php echo
$row['gambar_produk']; ?>" style="width: 120px;"></td>
<td>
 <a href="edit_produk.php?id=<?php echo $row['id'];
 ?>">Edit</a> |
 <a href="proses_hapus.php?id=<?php echo $row['id']; ?>"
 onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
 </td>
 </tr>

 <?php
 $no++; 
 }
 ?>
 <a href="logout.php">LOGOUT</a>
 </tbody>
 </table>
 
 
 </body>
</html>
