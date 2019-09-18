<?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = date("YmdHis");
        $nama_file_unik = $acak.$nama_file;
        
        if (!empty($lokasi_file)) {
            UploadProduk($nama_file_unik);
            $r = mysql_query("INSERT INTO produk(nama_produk, harga_produk, foto) VALUES ('$nama', '$harga', '$nama_file_unik')");
        } else {
            $r = mysql_query("INSERT INTO produk(nama_produk, harga_produk) VALUES ('$nama', '$harga')");
        }

        if ($r) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); window.location.href = 'media.php?page=produk'; </script>";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }
?>

<h1 class="h3 mb-2 text-gray-800">Produk</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="fupload" onchange="tampilkanPreview(this,'preview')" />
                    <img id="preview" src="" alt="" width="320px"/>
                </div>
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</div>
<script>
    function tampilkanPreview(gambar, idpreview) {
        //                membuat objek gambar
        var gb = gambar.files;
        //                loop untuk merender gambar
        for (var i = 0; i < gb.length; i++) {
            //                    bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //                        jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //                    membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //                        jika tipe data tidak sesuai
                alert("Type file tidak sesuai. Khusus image.");
            }
        }
    }
</script>