<?php  

include "../fungsi/koneksi.php";

if (isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['unit'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];
	$unit = $_GET['unit'];

	$query = mysqli_query($koneksi, "UPDATE permintaan SET status='4' WHERE id_permintaan='$id' ");

	if ($query) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

	// if($query) {
	// 	header("location:index.php?p=detil&tgl=$tgl&unit=$unit");
	// } else {
	// 	echo "error : " . mysqli_error($koneksi);
	// }
}


?>