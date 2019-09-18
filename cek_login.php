<?php
    session_start();

    include "config/koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $query = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status = '$status'");
    $r = mysql_fetch_array($query);
    $f = mysql_num_rows($query);

    if ($f > 0) {
        $_SESSION['username'] = $r['username'];
        $_SESSION['status'] = $r['status'];
        $_SESSION['nama'] = $r['nama'];

        echo "<script> alert('Berhasil Masuk $_SESSION[username]'); window.location.href = 'media.php';</script>";

    } else {

        echo "<script> alert('Gagal Masuk'); window.history.back(); </script>";

    }
?>