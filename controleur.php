<?php
session_start();

	include_once "libs/modele.php"; 
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		$_SESSION["erreur"]=0;
		switch($action)
		{

			case 'Ajouter un module' :

				header("Location: index.php?view=form");
				exit();  
			break;

			case 'Supprimer' :
				$id=$_GET["idButton"];
				deleteModule($id);

				header("Location: index.php?view=accueil");
				exit();  
			break;
			
			case 'newTemperature' :
				$id=$_GET["idButton"];
				$newT=$_GET["newT"];
				newTemp($id,$newT);
				header("Location: index.php?view=accueil");
				exit();  
			break;

			
			case 'Modifier la température' :
				$id=$_GET["idButton"];
				header("Location: index.php?view=modifTemp&id=$id");
				exit();  
			break;

			case 'Simuler' :
				$id=$_GET["idButton"];
				$temperature=$_GET["temperature"];
				$today = date("Y-m-d");   

				if($temperature==null){
					addSimulation($id,$today,0);
					header("Location: index.php?view=simulation&valid=0");
					exit();  
				}

				else if($temperature >= 25 || $temperature <= 15) {
					addSimulation($id,$today,0);
					header("Location: index.php?view=simulation&valid=0");
					exit();  
				} 
				else{
					addSimulation($id,$today,1);
					header("Location: index.php?view=simulation&valid=1");
					exit();  
				}
			break;

			case 'Retour' :
				header("Location: index.php?view=accueil");
				exit();  
			break;

			case 'Fini' :
				$name=$_GET["name"];
				$description=$_GET["description"];
				$number=$_GET["number"];
				$type=$_GET["type"];
				$working_condition=$_GET["working_condition"];
				$temperature=$_GET["temperature"];
				$operating_time=$_GET["operating_time"];
				$number_of_data_send=$_GET["number_of_data_send"];

				if (isset($name) && (!empty($name)) && (is_string($name))) {
					if (isset($description) && (!empty($description)) && (strlen($description) < 500 )){
						if ($number > 0) {
							if (isset($type) && (!empty($type)) && (is_string($type))) {
								if ($number_of_data_send > 0 || $number_of_data_send == null) {
									addModuleComplet($name, $description, $number, $type, $working_condition, $temperature, $operating_time, $number_of_data_send);
									header("Location: index.php?view=accueil&error=0");
									exit();	
								} 
								else {
									$error="nombre de donnée envoyé faux";
								}
							} 
							else {
								$error = "type faux";
							}
						}
						else {
							$error="nombre faux";
						}
					}
					else {
						$error="description fausse";
					}
					
				}
				else {
					$error="nom faux";
				}


				header("Location: index.php?view=form&error=$error");
				exit();

				break;
			}
		}

		

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";

	header("Location:" . $urlBase . $addArgs);
	
?>






