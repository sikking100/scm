<?php
    if (isset($_POST['submit'])) {
        $user = $_SESSION['username'];
        $id_produk = $_POST['produk'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $total = $harga * $jumlah;

        $r = mysql_query("INSERT INTO pesanan (username, id_produk, jumlah_produk, harga_produk, total) VALUES ('$user', '$id_produk', '$jumlah', '$harga', '$total')");

        $query = mysql_query("SELECT * FROM user WHERE username = '$_SESSION[username]'");
        $rs = mysql_fetch_array($query);
        $tujuan = mysql_query("SELECT * FROM user WHERE status = 'supplier'");
        $tj = mysql_fetch_array($tujuan);

        if ($r) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); window.location.href = 'media.php?page=pesanan'; </script>";

            $from = "nurizan100@gmail.com";    
            $to = "$tj[email]";    
            $subject = "Pesanan Barang";    
            $message = "Ada Barang Yang dipesan";   
            $headers = "From:" . $from;    
            mail($to,$subject,$message, $headers);    
            echo "Pesan email sudah terkirim.";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }
?>

<h1 class="h3 mb-2 text-gray-800">Pesanan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pesanan</h6>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <select class="form-control" id="produk" name="produk" onchange="changeValue(this.value)">
                        <option disabled="" selected="">Pilih</option>
                        <?php 
                        $sql=mysql_query("SELECT * FROM produk");
                        $jsArray = "var prdName = new Array();\n";
                        while ($data=mysql_fetch_array($sql)) {
                        
                        echo '<option value="'.$data['id_produk'].'">'.$data['nama_produk'].'</option> ';
                        $jsArray .= "prdName['" . $data['id_produk'] . "'] = {nama:'" . addslashes($data['harga_produk']) . "'};\n";
                        
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Jumlah Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="jumlah" class="form-control">
                </div>
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</div>
<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
        document.getElementById('harga').value = prdName[x].nama;   
    };  
</script>