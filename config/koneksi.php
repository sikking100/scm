<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "db_scm";

    mysql_connect($server, $username, $password) or die("Tidak Bisa Konek");
    mysql_select_db($db) or die("Tidak Ditemukan Database");
?>