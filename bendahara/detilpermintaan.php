<?php
include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";

if (isset($_GET['tgl']) && isset($_GET['unit'])) {
    $tgl = $_GET['tgl'];
    $unit = $_GET['unit'];

    $query = mysqli_query($koneksi, "SELECT permintaan.tgl_permintaan, permintaan.id_permintaan, permintaan.kode_brg, nama_brg, jumlah, satuan, status FROM permintaan INNER JOIN 
        stokbarang ON permintaan.kode_brg = stokbarang.kode_brg  WHERE tgl_permintaan='$tgl' AND unit='$unit'");
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'edit') {
        header("location:?p=editpesan");
    }
    if ($_GET['aksi'] == 'edit-ketersediaan') {
    }
}

?>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Proses Permintaan <?php echo $unit; ?></h3>
                </div>
                <div class="box-body">
                    <a href="index.php?p=datapermintaan" style="margin:10px;" class="btn btn-success"><i class='fa fa-backward'> Kembali</i></a>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                            <td>
                                                <?php if ($row['status'] < 2) : ?>
                                                    <a href="<?= 'edit_ketersediaan.php?id=' . $row['id_permintaan'] . '&aksi=tersedia' ?>" class="btn btn-success">Tersedia</a>
                                                    <a href="<?= 'edit_ketersediaan.php?id=' . $row['id_permintaan'] . '&aksi=tidak-tersedia' ?>" class="btn btn-danger">Tidak Tersedia</a>
                                                <?php endif; ?>
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