<?php  

$host = "127.0.0.1";
$username = "root";
$password = null;
$database = "bpbd";
$port = 3306;

$koneksi = mysqli_connect($host, $username, $password, $database, $port);

if (!$koneksi) {
	echo "Koneksi gagal " . mysqli_connect_error();
}

?>