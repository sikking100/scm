<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
            <form action="export.php" method="POST">
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
                <input type="submit" value="Cetak">
            </form>
    </div>
</div>