<?php
	require_once('../model/bdd/connexion.php');
	if (isset($_POST['save'])) {
		$num_assurance=htmlspecialchars($_POST['num_assurance']);
		$message=htmlspecialchars($_POST['message']);
	    $errors=array(); 
	     // ****************logo***************************
		$tmpName=$_FILES['image']['tmp_name'];
		$name=$_FILES['image']['name'];
		$size=$_FILES['image']['size'];
		$erreur=$_FILES['image']['error'];
		$type=$_FILES['image']['type'];
		// Voir l'extension du fichiers
		$tabExtension=explode('.', $name);
		$extension=strtolower(end($tabExtension));
		// Extension Autorisé
		$extensionAutorise=['jpg','jpeg','gif','png'];
		$tailleMax=2097152;

		if (in_array($extension, $extensionAutorise)) {

		if ($size<=$tailleMax) {

					if ($erreur==0) {
						$uniqueNom=uniqid('',true);
						$fileName=$uniqueNom.'.'.$extension;
						move_uploaded_file($tmpName,'../photo_sinistre/'.$fileName);

		$req=$pdo->prepare('SELECT id FROM assurance WHERE num_assurance=?');
				$req->execute([$_POST['num_assurance']]);
				$user=$req->fetch();
				if (!$user) {
					$errors['num_assurance']='votre N°ID du contrat d\'assurance n\'est pas reconnus dans notre base des données';
				}

		if (empty($errors)) {
				
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("INSERT INTO sinistre(num_assurance,message,image)VALUES(?,?,?)");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($num_assurance,$message,$fileName);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Votre demande a été envoyé avec succès, nous allons vous contactez dans le 24h par mail ou par votre numéro de telephone!')
			</script>
			<script>
				window.open('contact.php','_self')
			</script>
			<?php

			exit();	

			}
		}
		else
		{
			$errors['photo']= "erreur nous ne pouvons pas uploader cette image!";
		}

			
			}
			else
			{
				$errors['photo']= "taille trop importante";
			}
				
			
			}
			else
			{

			$errors['photo']= "Mauvaise Extension";

			} 
	}	
