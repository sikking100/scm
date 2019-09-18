<?php
    $r = mysql_query("DELETE FROM laporan_kasir WHERE id = '$_GET[id]'");
    if ($r) {
        echo "<script>
                alert('Data Berhasil Dihapus!!!');
                window.location.href = 'media.php?page=laporankasir';
            </script>";
    } else {
        echo "
        <script>
            alert('Gagal Menghapus Data!!!');
            window.location.href = 'media.php?page=laporankasir';
        </script>";
    }
?>