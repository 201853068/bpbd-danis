<?php  

include "../fungsi/koneksi.php";

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$tanggal = date('Y-m-d');
	
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status='3' WHERE id_permintaan='$id'");

	if ($query) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

	// $query2 = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE id_permintaan='$id'");
	
	// $row = mysqli_fetch_assoc($query2);

	// $query3 = mysqli_query($koneksi, "INSERT INTO pengeluaran (unit, kode_brg, jumlah, tgl_keluar)
	// 	VALUES ('$row[unit]', '$row[kode_brg]', '$row[jumlah]', '$tanggal' ) ");

	// if($query3) {
	// 	header("location:index.php?p=datapermintaan&tgl=$tgl&unit=$unit");
	// } else {
	// 	echo "ada yang salah" . mysqli_error($koneksi);
	// }
}


?>