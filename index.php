<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibBootstrap.php";
	include_once "libs/modele.php";

	// on récupère le paramètre view éventuel 
	$view = valider("view"); 

	// on recupere le paramètre valide pour le bouton simulation 
	$valid=$_GET["valid"];

	$idModule=$_GET["id"];

	$error=$_GET["error"];

	// S'il est vide, on charge la vue accueil par défaut
	if (!$view) $view = "accueil"; 


	include("templates/header.php");

	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case "accueil" : 
			include("templates/accueil.php");
		break;

		case "form" : 
			include("templates/form.php");
		break;

		case "simulation" : 
			include("templates/simulation.php");
		break;

		case "simulation" : 
			include("templates/simulation.php");
		break;


		case "modif" :
			include("templates/modif.php");
		break;

		case "modifTemp" :
			include("templates/modifTemp.php");
		break;

		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");
		break;

	}


	// Dans tous les cas, on affiche le pied de page
	// Qui contient les coordonnées de la personne si elle est connectée
	include("templates/footer.php");


	
?>








