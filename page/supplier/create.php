<?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama     = $_POST['nama'];
        $telp     = $_POST['telp'];
        $status   = $_POST['status'];
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = date("YmdHis");
        $nama_file_unik = $acak.$nama_file;
        
        if (!empty($lokasi_file)) {
            UploadImage($nama_file_unik);
            $r = mysql_query("INSERT INTO user(username, password, nama, telp, status, foto) VALUES('$username', '$password', '$nama', '$telp', '$status', '$nama_file_unik')");
        } else {
            $r = mysql_query("INSERT INTO user(username, password, nama, telp, status) VALUES('$username', '$password', '$nama', '$telp', '$status')");
        }

        if ($r) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); window.location.href = 'media.php?page=supplier'; </script>";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }
?>

<h1 class="h3 mb-2 text-gray-800">Supplier</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="telp" class="col-sm-2 col-form-label">Nomor Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="status" value="supplier" readonly>
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