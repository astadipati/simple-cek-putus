<?php
$host = "localhost";	//nama host
$user = "bosku";	//username 
$pass = "passente";	//password 
$dbname = "sipptuban";	//nama database

$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($dbname, $koneksi) or die("Tidak ada database yang dipilih!");
?>
