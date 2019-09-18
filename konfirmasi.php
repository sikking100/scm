<?php 
    include "config/koneksi.php";
    session_start();

    function acak($panjang)
    {
        $karakter = "1234567890";

        $string = "";

        for ($i=0; $i < $panjang; $i++) { 
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }

        return $string;
    }

    $id = $_GET['id'];

    $r = mysql_query("UPDATE pesanan SET status_order = '1' WHERE id_order = '$id'");

    if ($r) {
        $query = mysql_query("SELECT pesanan.username, pesanan.jumlah_produk, pesanan.harga_produk, pesanan.total, produk.nama_produk FROM pesanan JOIN produk ON pesanan.id_produk = produk.id_produk WHERE id_order = '$id'");
        $rs = mysql_fetch_array($query);

        $acak = acak(7);
        $tanggal = date('Y-m-d');

        mysql_query("INSERT INTO faktur (supplier, tujuan, no_faktur, jumlah, nama, harga, total, tanggal) VALUES ('$_SESSION[username]', '$rs[username]','$acak', '$rs[jumlah_produk]', '$rs[nama_produk]', '$rs[harga_produk]', '$rs[total]', '$tanggal')");

        echo "
            <script>
                alert('Sudah Di Konfirmasi!!!');
                window.location.href = 'media.php?page=konfirmasipesanan';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Di Konfirmasi!!!');
                window.location.href = 'media.php?page=konfirmasipesanan';
            </script>
        ";
    }
?>