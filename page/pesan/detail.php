<?php
    $query = mysql_query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
    $r = mysql_fetch_array($query);
?>
<h1 class="h3 mb-2 text-gray-800">Produk</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <img src="<?php echo "foto_produk/$r[foto]" ?>" alt="" width="100%">
            </div>
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td><?php echo "$r[nama_produk]" ?></td>
                    </tr>
                    <tr>
                        <td>Harga Produk</td>
                        <td>:</td>
                        <td>Rp. <?php echo "$r[harga_produk]" ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <br>
        <a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>
    </div>
</div>