<?php
    $r = mysql_query("DELETE FROM user WHERE id_user = '$_GET[id]'");
    HapusImage($_GET['foto']);
    if ($r) {
        echo "<script>
                alert('Data Berhasil Dihapus!!!');
                window.location.href = 'media.php?page=user';
            </script>";
    } else {
        echo "
        <script>
            alert('Gagal Menghapus Data!!!');
            window.location.href = 'media.php?page=user';
        </script>";
    }
?>