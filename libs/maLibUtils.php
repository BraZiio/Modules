<?php


/**
 * @file maLibUtils.php
 * Ce fichier définit des fonctions d'accès ou d'affichage pour les tableaux superglobaux
 */

/**
 * Vérifie l'existence (isset) et la taille (non vide) d'un paramètre dans un des tableaux GET, POST, COOKIES, SESSION
 * Renvoie false si le paramètre est vide ou absent
 * @note l'utilisation de empty est critique : 0 est empty !!
 * Lorsque l'on teste, il faut tester avec un ===
 * @param string $nom
 * @param string $type
 * @return string|boolean
 */
function valider($nom,$type="REQUEST")
{	
	switch($type)
	{
		case 'REQUEST': 
		if(isset($_REQUEST[$nom]) && !($_REQUEST[$nom] == "")) 	
			return proteger($_REQUEST[$nom]); 	
		break;
		case 'GET': 	
		if(isset($_GET[$nom]) && !($_GET[$nom] == "")) 			
			return proteger($_GET[$nom]); 
		break;
		case 'POST': 	
		if(isset($_POST[$nom]) && !($_POST[$nom] == "")) 	
			return proteger($_POST[$nom]); 		
		break;
		case 'COOKIE': 	
		if(isset($_COOKIE[$nom]) && !($_COOKIE[$nom] == "")) 	
			return proteger($_COOKIE[$nom]);	
		break;
		case 'SESSION': 
		if(isset($_SESSION[$nom]) && !($_SESSION[$nom] == "")) 	
			return $_SESSION[$nom]; 		
		break;
		case 'SERVER': 
		if(isset($_SERVER[$nom]) && !($_SERVER[$nom] == "")) 	
			return $_SERVER[$nom]; 		
		break;
	}
	return false; // Si pb pour récupérer la valeur 
}


/**
 * Vérifie l'existence (isset) et la taille (non vide) d'un paramètre dans un des tableaux GET, POST, COOKIE, SESSION
 * Prend un argument définissant la valeur renvoyée en cas d'absence de l'argument dans le tableau considéré

 * @param string $nom
 * @param string $defaut
 * @param string $type
 * @return string
*/
function getValue($nom,$defaut=false,$type="REQUEST")
{
	// NB : cette commande affecte la variable resultat une ou deux fois
	if (($resultat = valider($nom,$type)) === false)
		$resultat = $defaut;

	return $resultat;
}

/**
*
* Evite les injections SQL en protegeant les apostrophes par des '\'
* Attention : SQL server utilise des doubles apostrophes au lieu de \'
* ATTENTION : LA PROTECTION N'EST EFFECTIVE QUE SI ON ENCADRE TOUS LES ARGUMENTS PAR DES APOSTROPHES
* Y COMPRIS LES ARGUMENTS ENTIERS !!
* @param string $str
*/
function proteger($str)
{
	// attention au cas des select multiples !
	// On pourrait passer le tableau par référence et éviter la création d'un tableau auxiliaire
	if (is_array($str))
	{
		$nextTab = array();
		foreach($str as $cle => $val)
		{
			$nextTab[$cle] = addslashes($val);
		}
		return $nextTab;
	}
	else 	
		return addslashes ($str);
	//return str_replace("'","''",$str); 	//utile pour les serveurs de bdd Crosoft
}


function tprint($tab)
{
	echo "<pre>\n";
	print_r($tab);
	echo "</pre>\n";	
}


function rediriger($url,$qs="")
{
	if ($qs != "") $qs = "?$qs";
	header("Location:$url$qs"); // envoi par la méthode GET
	die(""); // interrompt l'interprétation du code 
}


function afficherFormImage($page,$dossier,$nomImg,$id=1)
{
	echo '<form enctype="multipart/form-data" method="post" action="./minControleur/data.php">';
	echo	'<input type="hidden" name="MAX_FILE_SIZE" value="10000000">';
	echo	'<input type="file" name="FileToUpload">';
	echo	'<input type="submit" value="Changer image" name="action">';
	echo 	'<input type="hidden" name="id" value="' .$id . '">';
	echo	'<input type="hidden" name="image" value="' .$nomImg . '">';
	echo	'<input type="hidden" name="dossier" value="' .$dossier . '">';
	echo	'<input type="hidden" name="page" value="' .$page . '">';
	echo '</form>';
}

//fonction qui crée le formulaire dans la page evenement
function afficherFormEvent($mail,$tel,$nom,$prenom){
	echo '<div id="event" style="margin-bottom:70px;margin-top:30px;">
  
      <h2 style="text-align: center">Formulaire de contact pour événement</h2>
      <div style="text-align: start">

        <div class="text-danger" id="danger" style="display: none">Saisissez tous les champs</div>
        
        <div class="form-group">
          <label for="pseudo">Pseudo</label>
          <input type="text" class="form-control" id="pseudo" placeholder="Saisir votre pseudo" value="'.$prenom.' '.$nom.'">
        </div>

        <div class="form-group">
          <label for="tel">Téléphone</label>
          <input type="text" class="form-control" id="tel" placeholder="Saisir votre numéro de téléphone" value="'.$tel.'">
        </div>
        
        <div class="form-group">
          <label for="mail">Mail</label>
          <input type="text" class="form-control" id="mail" placeholder="Saisir votre adresse email" value="'.$mail.'">
        </div>

        <div class="form-group">
          <label for="contenu">Votre événement en quelques mots ?</label>
          <textarea class="form-control" id="contenu" rows="3"></textarea>
        </div>
        <button type="submit" id="validerEvent"class="btn btn-primary mb-4">Valider</button>
      </div>
    </div>

	';
}

?>
