<?php
    if (isset($_POST['submit'])) {
        $tanggal = $_POST['tanggal'];
        $nama    = $_POST['produk'];
        $harga   = $_POST['harga'];
        $jumlah  = $_POST['jumlah'];
        $total   = $harga * $jumlah;
        
        $r = mysql_query("INSERT INTO laporan_kasir(nama_produk, harga_produk, jumlah, total, tanggal) VALUES ('$nama', '$harga', '$jumlah', '$total', '$tanggal')");

        if ($r) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); window.location.href = 'media.php?page=laporankasir'; </script>";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }

    $query = mysql_query("SELECT * FROM produk");
?>

<h1 class="h3 mb-2 text-gray-800">Laporan Kasir</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Laporan</h6>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control datepicker">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Produk</label>
                <div class="col-sm-10">
                    <select name="produk" class="form-control">
                        <option value="-">-- Pilih Produk --</option>
                        <?php
                            while($rr = mysql_fetch_array($query)) {
                                echo "
                                    <option value='$rr[nama_produk]'>$rr[nama_produk]</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga">
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah">
                </div>
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</div>