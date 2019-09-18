<?php
    $tahun = $_POST['tahun'];
    $bulan = mysql_query("SELECT DISTINCT MONTH(tanggal) AS bulan FROM laporan_kasir WHERE YEAR(tanggal) = '$tahun' ORDER BY MONTH(tanggal) ASC");
    $total = mysql_query("SELECT SUM(total) as subtotal FROM laporan_kasir WHERE YEAR(tanggal) = '$tahun' GROUP BY MONTH(tanggal)");
?>
<h1 class="h3 mb-2 text-gray-800">Laporan Kasir</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Penjualan Tahun <?php echo "$tahun"; ?></h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
            <canvas id="myChart"></canvas>
    </div>
</div>
    <script src="js/Chart.js"></script>
    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
        labels: [<?php
          $bulang = array(
            '1' => 'JANUARI',
            '2' => 'FEBRUARI',
            '3' => 'MARET',
            '4' => 'APRIL',
            '5' => 'MEI',
            '6' => 'JUNI',
            '7' => 'JULI',
            '8' => 'AGUSTUS',
            '9' => 'SEPTEMBER',
            '10' => 'OKTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DESEMBER',
          );
          while($b = mysql_fetch_array($bulan)) { echo'"' . $bulang[$b['bulan']] . '",'; } ?>],
				datasets: [{
					label: 'Penjualan',
					data: [<?php while ($s = mysql_fetch_array($total)) { echo '"' . $s['subtotal'] . '",';} ?>],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>