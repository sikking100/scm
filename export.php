<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
		include "config/koneksi.php";
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=DataPegawai.xls");
	?>
 
	<center>
		<h1>Laporan <br/> Penjualan</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
			<th>Total</th>
		</tr>
		<tr>
            <?php
				$tahun = $_POST['tahun'];
				$bulan = $_POST['bulan'];
                $query = mysql_query("SELECT * FROM laporan_kasir WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan' GROUP BY MONTH(tanggal) ORDER BY MONTH(tanggal) ASC");
                $no = 1;
                while($r = mysql_fetch_array($query)) {
                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$r[tanggal]</td>
                            <td>$r[nama_produk]</td>
                            <td>$r[harga_produk]</td>
                            <td>$r[jumlah]</td>
                            <td>$r[total]</td>
                        </tr>
                    ";
                    $no++;
                }
            ?>
		</tr>
	</table>
</body>
</html>