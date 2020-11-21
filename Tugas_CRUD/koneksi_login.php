<?php
$koneksi = mysqli_connect("localhost","root","","tugas_crud");
if (!$koneksi) {
	die ("Koneksi dengan datbase gagal:".mysql_connect_error());
}
?> 