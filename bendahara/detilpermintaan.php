<?php
include "../fungsi/koneksi.php";
include "../fungsi/fungsi.php";

if (isset($_GET['tgl']) && isset($_GET['unit'])) {
    $tgl = $_GET['tgl'];
    $unit = $_GET['unit'];

    $query = mysqli_query($koneksi, "SELECT permintaan.tgl_permintaan, permintaan.id_permintaan, permintaan.kode_brg, nama_brg, jumlah, jumlah_tersedia, satuan, status FROM permintaan INNER JOIN 
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
                                    <th>Jumlah Permintaan</th>
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
                                            <td> <?= $row['jumlah']; ?> </td>
                                            <td> <?= $row['jumlah_tersedia'] ?> </td>
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
                                                    <div class="row">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tersedia-<?= $row['id_permintaan'] ?>">
                                                            Tersedia
                                                        </button>
                                                        <div class="modal fade" id="tersedia-<?= $row['id_permintaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <form action="<?= 'edit_ketersediaan.php?id=' . $row['id_permintaan'] . '&aksi=tersedia' ?>" method="post">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Ketersediaan</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="jumlah" class="control-label">Jumlah Tersedia</label>
                                                                                <input type="number" value="<?= $row['jumlah']; ?>" class="form-control" name="jumlah">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <a href="<?= 'edit_ketersediaan.php?id=' . $row['id_permintaan'] . '&aksi=tidak-tersedia' ?>" class="btn btn-danger">Tidak Tersedia</a>
                                                    </div>
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