<h1 class="h3 mb-2 text-gray-800">Faktur</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Faktur</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No. Faktur</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>No. Faktur</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT * FROM faktur");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                                <tr>
                                    <td>$r[tanggal]</td>
                                    <td>$r[no_faktur]</td>
                                    <td>$r[total]</td>
                                    <td>";
                                        if ($_SESSION['status'] == 'admin') {
                                            echo ($r['status']=='0') ? 'Belum Bayar' : 'Sudah Bayar';
                                        } else {
                                            if ($r['status']=='0') {
                                                echo "<a class='btn btn-warning' href='media.php?page=konfirmasibayar&id=$r[id]'>Belum Bayar</a></td>";
                                            } else {
                                                echo "<button class='btn btn-success' disabled>Sudah Di Bayar</button>";
                                            }
                                        }
                                    echo"
                                    </td>
                                    <td><a class='btn btn-info' href='media.php?page=detailfaktur&id=$r[id]'>Detail</a></td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>