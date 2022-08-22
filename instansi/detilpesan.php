<?php

include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";
if (isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
    $query = mysqli_query($koneksi, "SELECT  permintaan.id_permintaan, permintaan.kode_brg, nama_brg, jumlah, jumlah_tersedia, satuan, status FROM permintaan INNER JOIN 
        stokbarang ON permintaan.kode_brg = stokbarang.kode_brg  WHERE tgl_permintaan='$tgl' AND unit='$_SESSION[username]' ");
}

if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $aksi = $_GET['aksi'];
    $id = $_GET['id'];
    if ($aksi == 'hapus') {
        $query2 = mysqli_query($koneksi, "DELETE FROM permintaan WHERE id_permintaan='$id' ");
        if ($query2) {
            header("location:?p=detil&tgl=" . $tgl);
        } else {
            echo 'gagal';
        }
    }
}
?>

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Permintaan Barang Tanggal <?php echo tanggal_indo($tgl); ?></h3>
                </div>
                <div class="box-body">
                    <a href="index.php?p=datapesanan" style="margin:10px;" class="btn btn-success"><i class='fa fa-backward'> Kembali</i></a>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Jumlah Permintaan</th>
                                    <th>Jumlah Tersedia</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    if (mysqli_num_rows($query)) {
                                        while ($row = mysqli_fetch_assoc($query)) :

                                    ?>
                                            <td> <?= $no; ?> </td>
                                            <td> <?= $row['kode_brg']; ?> </td>
                                            <td> <?= $row['nama_brg']; ?> </td>
                                            <td> <?= $row['satuan']; ?> </td>
                                            <td> <?= $row['jumlah']; ?> </td>
                                            <td> <?= $row['jumlah_tersedia']; ?> </td>
                                            <td> <?php
                                                    $status = '';
                                                    switch ($row['status']) {
                                                        case 0:
                                                            $status = 'Menunggu Cek Ketersediaan';
                                                            break;
                                                        case 1:
                                                            $status = 'Tidak Tersedia';
                                                            break;
                                                        case 2:
                                                            $status = 'Menunggu Persetujuan';
                                                            break;
                                                        case 3:
                                                            $status = 'Telah Disetujui';
                                                            break;
                                                        case 4:
                                                            $status = 'Tidak Disetujui';
                                                            break;
                                                        default:
                                                            $status = 'Tidak Diketahui';
                                                            break;
                                                    }
                                                    echo '<span>' . $status . '</span>';
                                                    ?>
                                            </td>


                                </tr>

                        <?php $no++;
                                        endwhile;
                                    } else {
                                        echo "<tr><td colspan=9>Tidak ada permintaan material teknik.</td></tr>";
                                    } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>