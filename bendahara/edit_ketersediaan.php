<?php  

include "../fungsi/koneksi.php";

$id = $_GET['id'];
$status = $_GET['aksi'] == 'tersedia' ? 2 : 1;

$query = "UPDATE permintaan SET status='$status'";
if($status == 2) {
    $jumlah_tersedia = $_POST["jumlah"];
    $query = $query . ", jumlah_tersedia='$jumlah_tersedia'";
}
$query = $query . " WHERE id_permintaan='$id'";

$query = mysqli_query($koneksi, $query);
if ($query) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo 'error' . mysqli_error($koneksi);
}
