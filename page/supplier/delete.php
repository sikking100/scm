<?php
    $r = mysql_query("DELETE FROM user WHERE id_user = '$_GET[id]'");
    if ($r) {
        echo "<script>
                alert('Data Berhasil Dihapus!!!');
                window.location.href = 'media.php?page=supplier';
            </script>";
    } else {
        echo "
        <script>
            alert('Gagal Menghapus Data!!!');
            window.location.href = 'media.php?page=supplier';
        </script>";
    }
?>