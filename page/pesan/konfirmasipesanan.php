<h1 class="h3 mb-2 text-gray-800">Pesanan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Order</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Harga Produk</th>
                        <th>Total</th>
                        <th>Status Order</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Order</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Harga Produk</th>
                        <th>Total</th>
                        <th>Status Order</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT pesanan.order_dibuat, produk.nama_produk, pesanan.jumlah_produk, pesanan.harga_produk, pesanan.id_order, pesanan.status_order, pesanan.total FROM pesanan JOIN produk ON pesanan.id_produk = produk.id_produk ");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                            <tr>
                                <td>$r[order_dibuat]</td>
                                <td>$r[nama_produk]</td>
                                <td>$r[jumlah_produk]</td>
                                <td>$r[harga_produk]</td>
                                <td>$r[total]</td>
                                <td>";
                                    if ($r['status_order'] == '0') {
                                        echo "<a href='konfirmasi.php?id=$r[id_order]' class='btn btn-danger'>Belum Di Konfirmasi</a>";
                                    } else {
                                        echo "<button class='btn btn-success' disabled>Sudah Di Konfirmasi</button>";
                                    }
                                    echo"
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>