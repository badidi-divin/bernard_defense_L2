<?php
	session_start();
	$id=1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="../css/test2.css">
</head>
	<style type="text/css">
		/** Pour creer un decallage **/
			.spacer{
				padding-top: 80px;
			}
			.space{
				margin-top: 60px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
	<body>
		<!-- Navigation -->
	
	<!-- navigation end -->
	<?php 
	    require_once("../../model/bdd/connexion.php");
		require_once('../../model/selection_sinistre2.php');
	?>
	<div class="contenair col-lg-12 col-md-6">
			<div align="center">
				<img src="../../includes/1.PNG" width="100px" height="120px">
				<h2 style="font-weight: bold;"><u> LISTE DES SINISTRE TRAITER DE SONAS RDC</u></h2>
				
			</div>
			<div class="col-md-12 col-xs-12 ">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						SONAS RDC
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<div class="table-responsive table--no-card m-b-30">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th><th>NUMERO ASSURANCE</th><th>MESSAGE</th><th>IMAGES</th><th>DATES</th>
									</tr>
								</thead>
															<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($id)?></td>
								<td><?php  echo($et['num_assurance']) ?></td>
								<td><?php  echo($et['message'])?></td>
								<td> <a href="../../photo_sinistre/<?= $et['image']; ?>" target="_blank"><img src="../../photo_sinistre/<?= $et['image']; ?>" width="100px" height="80px"></a> </td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								
											</tr>	
									<?php $id++;} ?>	
							</tbody>
							</table>
						</div>
					</div>
				</div>	
			</div>
		</div>
	<!-- Circulation de la page -->
	</body>
</html>
