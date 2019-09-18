<?php
    $query = mysql_query("SELECT * FROM laporan_kasir WHERE id = '$_GET[id]'");
    $r = mysql_fetch_array($query);

    if (isset($_POST['submit'])) {
        $tanggal = $_POST['tanggal'];
        $nama    = $_POST['produk'];
        $harga   = $_POST['harga'];
        $jumlah  = $_POST['jumlah'];
        
            $rr = mysql_query("UPDATE laporan_kasir SET nama_produk = '$nama', harga_produk = '$harga', jumlah = '$jumlah', tanggal = '$tanggal' WHERE id = '$_GET[id]'");

        if ($rr) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); 
                window.location.href = 'media.php?page=laporankasir'; </script>";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }
?>
<h1 class="h3 mb-2 text-gray-800">User</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
    </div>
    <div class="card-body">
    <form method="POST">
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control datepicker" value="<?php echo "$r[tanggal]"; ?> ">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                    <select name="produk" class="form-control">
                        <?php
                            $produk = mysql_query("SELECT * FROM produk");
                            while($p = mysql_fetch_array($produk)) {
                                if ($r['nama_produk'] == $p['nama_produk']) {
                                    echo "
                                        <option value=$p[nama_produk] selected>$p[nama_produk]</option>
                                    ";
                                } else {
                                    echo "
                                        <option value=$p[nama_produk]>$p[nama_produk]</option>
                                    ";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga" value="<?php echo "$r[harga_produk]"; ?> ">
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" value="<?php echo "$r[jumlah]"; ?> ">
                </div>
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</div>