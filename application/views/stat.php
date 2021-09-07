<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Statistiques</title>
        
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" 
	integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" 
	crossorigin="anonymous" />
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
                width: 100%;
                height: 100%;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
        
        
	#nav1{
		float: left;
		width: 30%;
		height: 100%;
	}
	#nav2{
		float: right;
		width: 60%;
		height: 100%;
	}

	#content{
		margin-left: 35%;
		margin-right: 100px;
		width: 1%;
		height: 1000px;
		margin-top: 10px;
		margin-bottom: 10px;
	        background-color: beige;
	}
	#footer{
		height: 75px;
		padding: 20Px;
		border: 2px solid black;
	}
	</style>
</head>

<body>
	<div id="container">


		<?php if(ISSET($chauffeur)){
			$nom = array();
			$note = array();
			for ($i=0; $i < count($chauffeur) ; $i++) { 
			    $nom[$i] = $chauffeur[$i]['nomchauffeur'];
			    $note[$i] = $chauffeur[$i]['notemoyenne'];
			    
		} ?>

		<h1>Statistique note par chauffeur</h1>

		<div id="nav1">
            <h1>Tableau</h1>
            <table border="1" style="border-spacing: 0;width: 80%;text-align: center">
				<thead>
					<tr>
						<th>Nom chauffeur</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody>
		            <?php for ($i=0; $i < count($chauffeur) ; $i++) { ?>

					<tr>
						<td><?php echo $chauffeur[$i]['nomchauffeur']; ?></td>
						<td><?php echo $chauffeur[$i]['notemoyenne']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	
		</div>

		<div id="nav2">
                
         <h1>Histogramme</h1>
         
         <canvas id="myChart" width="80%" height="80%"></canvas>
			        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
					integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" 
					crossorigin="anonymous"></script>
					
					
			<script>
                var nom = <?php echo json_encode($nom); ?>;
                var note = <?php echo json_encode($note); ?>;
                var ctx = document.getElementById('myChart');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nom,
                        datasets: [{
                            label: 'Note',
                            data: note,
                            backgroundColor: 
                                '#FFB6C1',

                            borderColor: 
                                'rgba(153, 102, 235, 1)',

                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                	}
                                }]
                    		}
                    	}
                });
			</script>
        </div>
    <?php }?>

        <?php if(ISSET($passager)){
			$nom = array();
			$note = array();
			for ($i=0; $i < count($passager) ; $i++) { 
			    $nom[$i] = $passager[$i]['nompassager'];
			    $note[$i] = $passager[$i]['notemoyenne'];
			    
		} ?>


		<h1>Statistique note par passager</h1>

		<div id="nav1">
            <h1>Tableau</h1>
            <table border="1" style="border-spacing: 0;width: 80%;text-align: center">
				<thead>
					<tr>
						<th>Nom passager</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody>
		            <?php for ($i=0; $i < count($passager) ; $i++) { ?>

					<tr>
						<td><?php echo $passager[$i]['nompassager']; ?></td>
						<td><?php echo $passager[$i]['notemoyenne']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	
		</div>

		<div id="nav2">
                
         <h1>Histogramme</h1>
         
         <canvas id="myChart" width="80%" height="80%"></canvas>
			        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
					integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" 
					crossorigin="anonymous"></script>
					
					
			<script>
                var nom = <?php echo json_encode($nom); ?>;
                var note = <?php echo json_encode($note); ?>;
                var ctx = document.getElementById('myChart');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: nom,
                        datasets: [{
                            label: 'Note',
                            data: note,
                            backgroundColor: 
                                '#FFB6C1',

                            borderColor: 
                                'rgba(153, 102, 235, 1)',

                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                	}
                                }]
                    		}
                    	}
                });
			</script>
        </div>

    	<?php }?>




    	<?php if(ISSET($chiffre)){
			$nom = array();
			$note = array();
			for ($i=0; $i < count($chiffre) ; $i++) { 
			    $mois[$i] = $chiffre[$i]['mois'];
			    $valeur[$i] = $chiffre[$i]['valeur'];
			    
		} ?>


		<h1>Chiffre d'affaire par mois par année</h1>

		<div id="nav1">
            <h1>Tableau</h1>
            <table border="1" style="border-spacing: 0;width: 80%;text-align: center">
				<thead>
					<tr>
						<th>Mois</th>
						<th>Valeur</th>
					</tr>
				</thead>
				<tbody>
		            <?php for ($i=0; $i < count($chiffre) ; $i++) { ?>

					<tr>
						<td><?php echo $chiffre[$i]['mois']; ?></td>
						<td><?php echo $chiffre[$i]['valeur']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	
		</div>

		<div id="nav2">
                
         <h1>Histogramme</h1>
         
         <canvas id="myChart" width="80%" height="80%"></canvas>
			        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
					integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" 
					crossorigin="anonymous"></script>
					
					
			<script>
                var mois = <?php echo json_encode($mois); ?>;
                var valeur = <?php echo json_encode($valeur); ?>;
                var ctx = document.getElementById('myChart');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: mois,
                        datasets: [{
                            label: 'Chiffre',
                            data: valeur,
                            backgroundColor: 
                                '#FFB6C1',

                            borderColor: 
                                'rgba(153, 102, 235, 1)',

                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                	}
                                }]
                    		}
                    	}
                });
			</script>
        </div>

    	<?php }?>

	</div>
</body>
</html>