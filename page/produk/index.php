<h1 class="h3 mb-2 text-gray-800">Produk</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Produk</h6>
        <a href="media.php?page=tambahproduk" class="btn btn-primary btn-lg"><i class="fas fa-user-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
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
                                <td><a class='btn btn-info btn-circle' href='media.php?page=detailproduk&id=$r[id_produk]'><i class='fas fa-users-cog'></i></a>
                                    <a class='btn btn-warning btn-circle' href='media.php?page=editproduk&id=$r[id_produk]'><i class='fas fa-user-edit'></i></a>
                                    ";
                            ?> 
                                    <a class="btn btn-danger btn-circle" href="media.php?page=hapusproduk&id=<?php echo "$r[id_produk]"; ?>&foto=<?php echo "$r[foto]"; ?>" onclick="return confirm('Are you sure you want to Remove?');"><i class="fas fa-user-times"></i></a>
                            <?php echo "
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>