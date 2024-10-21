<?php  
	$mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	$requete="SELECT * FROM assurance WHERE num_assurance LIKE '%$mot1%'";	
	$resultat=$pdo->query($requete);
