<?php
	session_start();
	require_once('securico.php');
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
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Assurance</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="sinistre.php">Sinistre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
	<?php 
	    require_once("../../model/bdd/connexion.php");
		require_once('../../model/selection_candidat.php');
	?>
	<div class="contenair col-lg-12 col-md-6 spacer">
		<div class="panel panel-primary ">
				<div class="panel-heading">
					Rechercher
				</div>
				<div class="panel-body">
					<form method="get" action="" class="form-inline">
						<div class="form-group">
							<label for="propri">Num-Assurance:</label>
							<input type="text" name="mot1" class="form-control" placeholder="Mettez le numéro Assurance" value="<?php echo $mot1 ?>">
						</div>
						<button type="submit" class="btn btn-success">
						<span class="glyphicon glyphicon-search"></span></button>
						&nbsp;&nbsp;
						<a href="ajout-assureur.php" class="btn btn-primary" title="Ajouter assureur"><span class="glyphicon glyphicon-plus"></span></a>
						&nbsp;&nbsp;
						<a href="imprimer.php" class="btn btn-primary" title="Imprimer Assurés validés"><span class="glyphicon glyphicon-print"></span></a>
					</form>
				</div>
			</div>

		<div align="center">

			<h1 style="font-size: 45px;">
				<span class="glyphicon glyphicon-user"></span> Bienvenue  <?php echo $_SESSION['username']; ?>
			</h1>
		</div>

			<div class="col-md-12 col-xs-12 ">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES ASSURES
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<div class="table-responsive table--no-card m-b-30">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th><th>NOM COMPLET</th><th>SEXE</th><th>EMAIL</th><th>TELEPHONE</th>
										<th>NUM_ASSURANCE</th>
										<th>DEMANDE</th><th>ADRESSE</th><th>FICHIER</th><th>DATES</th>
									</tr>
								</thead>
															<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($id)?></td>
								<td><?php  echo($et['nom']." ".$et['postnom']." ".$et['prenom'])?></td>
								<td><?php  echo($et['sexe'])?></td>
								<td><?php  echo($et['email'])?></td>
								<td>+<?php  echo($et['numero'])?></td>
								<td><?php  echo $et['num_assurance'] ?></td>
								<td><?php  echo($et['demande'])?></td>
								<td><?php  echo($et['adresse'])?></td>
								<td><a href="../pdf/<?php  echo($et['chemin'])?>" target="_blank"><?php  echo($et['fichier'])?></a></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="../../model/supprimer-candidat.php?id=<?php echo($et['id'])?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a><br>							
								<a href="Editetudiant.php?id=<?php echo($et['id'])?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								</td>
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
