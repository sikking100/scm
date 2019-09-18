<h1 class="h3 mb-2 text-gray-800">Laporan Kasir</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php 
        $bulang = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Meri',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $bulan = $_POST['bulan'];
        echo "Bulan $bulang[$bulan] Tahun $_POST[tahun]"; ?></h6>
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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT * FROM laporan_kasir WHERE YEAR(tanggal) = $_POST[tahun] AND MONTH(tanggal) = $_POST[bulan]");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                            <tr>
                                <td>$r[tanggal]</td>
                                <td>$r[nama_produk]</td>
                                <td>$r[harga_produk]</td>
                                <td>$r[jumlah]</td>
                                <td>$r[total]</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>