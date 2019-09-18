<?php
    $r = mysql_query("UPDATE faktur SET status = '1' WHERE id = '$_GET[id]'");

    if ($r) {
        echo "
            <script>
                alert('Sudah Di Bayar!!!');
                window.location.href = 'media.php?page=faktur';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Di Bayar!!!');
                window.location.href = 'media.php?page=faktur';
            </script>
        ";
    }