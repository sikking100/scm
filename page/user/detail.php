<?php
    $query = mysql_query("SELECT * FROM user WHERE id_user = '$_GET[id]'");
    $r = mysql_fetch_array($query);

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
            $rr = mysql_query("UPDATE user SET username = '$username', password = '$password', nama = '$nama', telp = '$telp', status = '$status', foto = '$nama_file_unik' WHERE id_user = '$_GET[id]'");
        } else {
            $rr = mysql_query("UPDATE user SET username = '$username', password = '$password', nama = '$nama', telp = '$telp', status = '$status' WHERE id_user = '$_GET[id]'");
        }

        if ($rr) {
            echo "<script> alert('Data Berhasil Disimpan!!!'); window.location.href = 'media.php?page=user'; </script>";
        } else {
            echo "<script> alert('Gagal Menyimpan!!!'); </script>";
        }
    }
?>
<h1 class="h3 mb-2 text-gray-800">User</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <img src="<?php echo "foto/$r[foto]" ?>" alt="" width="100%">
            </div>
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo "$r[username]" ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo "$r[nama]" ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo "$r[alamat]" ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo "$r[email]" ?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><?php echo "$r[telp]" ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo "$r[status]" ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <br>
        <?php
            if ($r['status'] != 'admin') {
                echo "<div class='row'>
                        <a href='media.php?page=edituser&id=$r[id_user]' class='btn btn-primary'>Edit</a>
                        </div>";
            } else {
                echo '<a class="btn btn-primary" href="javascript:history.back()"><i class="fas fa-arrow-left"></i></a>';
            }
        ?>
    </div>
</div>