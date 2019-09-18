<h1 class="h3 mb-2 text-gray-800">Produk</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Produk</h6>
        <a href="media.php?page=tambahpesanan" class="btn btn-primary btn-lg"><i class="fas fa-user-plus"></i> Pesan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT * FROM produk");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                            <tr>
                                <td>$r[nama_produk]</td>
                                <td>$r[harga_produk]</td>
                                <td><img src='foto_produk/small_$r[foto]'></td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>