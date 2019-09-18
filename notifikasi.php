<?php
    include "config/koneksi.php";

    session_start();

    if ($_SESSION['status'] == 'supplier') {
        $query = mysql_query("SELECT * FROM pesanan WHERE status_order = '0'");   
    } elseif ($_SESSION['status'] == 'admin') {
        $query = mysql_query("SELECT * FROM pesanan WHERE status_order = '1'");
    }
    $r = mysql_num_rows($query);
    echo json_encode($r);

?>