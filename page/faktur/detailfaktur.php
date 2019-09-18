<?php
    $query = mysql_query("SELECT * FROM faktur WHERE id = '$_GET[id]'");
    $r = mysql_fetch_array($query);
    $tanggal = $r['tanggal'];
    $spp = $r['supplier'];
    $supplier = mysql_query("SELECT * FROM user WHERE username = '$spp'");
    $sp = mysql_fetch_array($supplier);
    $tjj = $r['tujuan'];
    $tujuan = mysql_query("SELECT * FROM user WHERE username = '$tjj'");
    $tj = mysql_fetch_array($tujuan);
?>

<h1 class="h3 mb-2 text-gray-800">Faktur</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Faktur</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <table>
                    <tr>
                        <td><?php echo "$sp[nama]"; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "$sp[alamat]"; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "$sp[email]"; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "$sp[telp]"; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4">
                <table>
                    <tr>
                        <td><?php echo "$r[tanggal]"; ?></td>
                    </tr>
                    <tr>
                        <td>Kepada Yth:</td>
                    </tr>
                    <tr>
                        <td><?php echo "$tj[nama]"; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "$tj[alamat]"; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                Faktur No. : <?php echo "$r[no_faktur]"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Banyak</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                    </tr>
                    <?php
                        $qry = mysql_query("SELECT * FROM faktur WHERE id = '$_GET[id]'");
                        while($rs = mysql_fetch_array($qry)) {
                            echo "
                                <tr>
                                    <td>$rs[jumlah]</td>
                                    <td>$rs[nama]</td>
                                    <td>$rs[harga]</td>
                                    <td>$rs[total]</td>
                                </tr>
                            ";
                        }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>
                            <?php
                                $qr = mysql_query("SELECT SUM(IF(tanggal = '$tanggal', total, 0)) AS subtotal FROM faktur");
                                $sub = mysql_fetch_array($qr);
                                echo "$sub[subtotal]";
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
</div>