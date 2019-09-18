<h1 class="h3 mb-2 text-gray-800">Laporan Kasir</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <?php 
        if ($_SESSION['status'] == 'kasir') {
    ?>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Laporan</h6>
        <a href="media.php?page=createlaporan" class="btn btn-primary btn-lg"><i class="fas fa-user-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT * FROM laporan_kasir");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                            <tr>
                                <td>$r[tanggal]</td>
                                <td>$r[nama_produk]</td>
                                <td>$r[harga_produk]</td>
                                <td>$r[jumlah]</td>
                                <td>$r[total]</td>
                                <td><a class='btn btn-warning btn-circle' href='media.php?page=editlaporan&id=$r[id]'><i class='fas fa-user-edit'></i></a>
                                    ";
                            ?> 
                                    <a class="btn btn-danger btn-circle" href="media.php?page=hapuslaporan&id=<?php echo "$r[id]"; ?>" onclick="return confirm('Are you sure you want to Remove?');"><i class="fas fa-user-times"></i></a>
                            <?php echo "
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } else { ?>
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tampilkan Laporan</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
            <?php if ($_GET['page'] == 'laporankasir') { ?>
            <form action="media.php?page=chart" method="POST">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun">
                    <?php
                        $tahun = mysql_query("SELECT YEAR(tanggal) AS tahun FROM laporan_kasir ORDER BY YEAR(tanggal) DESC");
                        $t = mysql_fetch_array($tahun);
                        echo "<option value=$t[tahun]>$t[tahun]</option>";
                    ?>
                    </select>
                </div>
                <input type="submit" value="Tampilkan">
            </form>
            <?php } else { ?>
            <form action="media.php?page=tampilkanlaporan" method="POST">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun">
                    <?php
                        $tahun = mysql_query("SELECT YEAR(tanggal) AS tahun FROM laporan_kasir ORDER BY YEAR(tanggal) DESC");
                        $t = mysql_fetch_array($tahun);
                        echo "<option value=$t[tahun]>$t[tahun]</option>";
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select name="bulan">
                    <?php
                        $bulan = mysql_query("SELECT MONTH(tanggal) AS bulan FROM laporan_kasir ORDER BY MONTH(tanggal) ASC");
                        $b = mysql_fetch_array($bulan);
                        $bulang = array(
                            '1' => 'JANUARI',
                            '2' => 'FEBRUARI',
                            '3' => 'MARET',
                            '4' => 'APRIL',
                            '5' => 'MEI',
                            '6' => 'JUNI',
                            '7' => 'JULI',
                            '8' => 'AGUSTUS',
                            '9' => 'SEPTEMBER',
                            '10' => 'OKTOBER',
                            '11' => 'NOVEMBER',
                            '12' => 'DESEMBER',
                        );
                        echo "<option value=$b[bulan]>" . $bulang[$b['bulan']] . "</option>";
                    ?>
                    </select>
                </div>
                <input type="submit" value="Tampilkan">
            </form>
            <?php } ?>
    </div>
    <?php } ?>
</div>