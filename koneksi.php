<?php
$host = "localhost";	//nama host
$user = "root";	//username phpMyAdmin
$pass = "Kul0nuwun";	//password phpMyAdmin
$dbname = "sipp311";	//nama database

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($dbname, $koneksi) or die("Tidak ada database yang dipilih!");
?>
