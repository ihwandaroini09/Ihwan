<?php
$koneksi = mysqli_connect("localhost","root","","crud_penjualan");
if (!$koneksi) {
	die ("Koneksi dengan datbase gagal:".mysql_connect_error());
}
?> 