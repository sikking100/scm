<?php
    $r = mysql_query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");
    HapusFotoProduk($_GET['foto']);
    if ($r) {
        echo "<script>
                alert('Data Berhasil Dihapus!!!');
                window.location.href = 'media.php?page=produk';
            </script>";
    } else {
        echo "
        <script>
            alert('Gagal Menghapus Data!!!');
            window.location.href = 'media.php?page=produk';
        </script>";
    }
?>