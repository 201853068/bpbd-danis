<?php  

include "../fungsi/koneksi.php";

$id = $_GET['id'];
$status = $_GET['aksi'] == 'tersedia' ? 2 : 1;

$query = mysqli_query($koneksi, "UPDATE permintaan SET status='$status' WHERE id_permintaan='$id'");
if ($query) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo 'error' . mysqli_error($koneksi);
}
?>