<?php 
include 'koneksi.php';
?>
 
<h3>Form Pencarian</h3>
 <link rel="stylesheet" type="text/css" href="style.css">
<form action="cariuser.php" method="GET">
 <label>Cari :</label>
 <input type="text" name="cari">
 <input type="submit" value="Cari">
</form>
 
<?php 
if(isset($_GET['cari'])){
 $cari = $_GET['cari'];
 echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 
<table border="1">
 <tr>
  <th>id</th>
  <th>Nama</th>
  <th>Deskripsi</th>
  <th>harga beli</th>
  <th>harga jual</th>
  <th>gambar</th>
 </tr>
 <?php 
 if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $data = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE nama_produk like '%".$cari."%' or harga_jual like '%".$cari."%'");    
 }else{
  $data = mysqli_query($koneksi,"SELECT * FROM penjualan");  
 }
 $no = 1;
 while($row = mysqli_fetch_array($data)){
 ?>
<tr>
<td><?php echo $no++; ?></td>
 <td><?php echo $row['nama_produk']; ?></td>
 <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
 <td>Rp <?php 
 echo
number_format($row['harga_beli'],0,',','.'); ?></td>
 <td>Rp <?php echo $row['harga_jual']; ?></td>
 <td style="text-align: center;"><img src="gambar/<?php echo
$row['gambar_produk']; ?>" style="width: 120px;"></td>
  </tr>
 <?php } ?>

</table>
<center>
<a href="logout.php">LOGOUT</a>