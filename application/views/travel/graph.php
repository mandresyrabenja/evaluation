<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Evaluation</title>
</head>

<style>
	body{
		font-weight: bold;
	}
</style>

<body>
	<div class="container" id>
		<div class="row">
			<div class="col-md-12"><h2>Trajet total par jour</h2></div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div>
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	axios.get('http://localhost/evaluation/travel/carDailyTravel?car_id=<?= $car_id ?>')
	.then(function (response) {
		res = response.data;

		var dates = [];
		for(i = 0; i < res.length; i++) {
			dates[i] = res[i].date;
		}
		
		var kms = [];
		for(i = 0; i < res.length; i++) {
			kms[i] = res[i].km;
		}

		const data = {
			labels: dates,
			datasets: [{
			label: 'Trajet total par jour',
			backgroundColor: 'rgb(255, 99, 132)',
			borderColor: 'rgb(255, 99, 132)',
			data: kms,
			}]
		};

		const config = {
			type: 'bar',
			data: data,
			options: {}
		};
			
		const myChart = new Chart(
			document.getElementById('myChart'),
			config
		);

	});
  
</script>
</body>
</html>