<?php
include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";

if (isset($_GET['tgl']) && isset($_GET['unit'])) {
    $tgl = $_GET['tgl'];
    $unit = $_GET['unit'];

    $query = mysqli_query($koneksi, "SELECT permintaan.tgl_permintaan, permintaan.id_permintaan, permintaan.kode_brg, nama_brg, jumlah_tersedia, satuan, status FROM permintaan INNER JOIN 
        stokbarang ON permintaan.kode_brg = stokbarang.kode_brg  WHERE tgl_permintaan='$tgl' AND unit='$unit' AND status>1");
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'edit')
        header("location:?p=editpesan");
}

?>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Konfirmasi Permintaan <?php echo $unit; ?></h3>
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
                                    <th>Jumlah Tersedia</th>
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
                                            <td>

                                                <a href="setuju.php?id=<?= $row['id_permintaan']; ?>"><span data-placement='top' data-toggle='tooltip' title='Setujui'><button class="btn btn-success">Setujui</button></span></a>

                                                <a href="tidaksetuju.php?tgl=<?= $tgl; ?>&unit=<?= $unit; ?>&id=<?= $row['id_permintaan']; ?>"><span data-placement='top' data-toggle='tooltip' title='Tidak Setuju'><button class="btn btn-danger">Tidak Setuju</button></span></a>



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