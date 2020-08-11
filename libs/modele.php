




<?php

include_once("maLibSQL.pdo.php");

function addModuleComplet($name, $description, $number, $type, $working_condition, $temperature, $operating_time, $number_of_data_send) {
	if($temperature == null && $operating_time ==  null) {
		if($number_of_data_send == null) {
			$number_of_data_send = 0;
		}
		$SQL="INSERT INTO modules(name, description, number, type, working_condition, number_of_data_send) VALUES('$name','$description','$number','$type', '$working_condition', '$number_of_data_send')";
		return SQLInsert($SQL);
	}
	
	else if ($temperature == null) {
		if($number_of_data_send == null) {
			$number_of_data_send = 0;
		}
		$SQL="INSERT INTO modules(name, description, number, type, working_condition , operating_time, number_of_data_send) VALUES('$name','$description','$number','$type', '$working_condition', '$operating_time', '$number_of_data_send')";
		return SQLInsert($SQL);
	}

	else if($operating_time == null) {
		if($number_of_data_send == null) {
			$number_of_data_send = 0;
		}
		$SQL="INSERT INTO modules(name, description, number, type, working_condition , temperature, number_of_data_send) VALUES('$name','$description','$number','$type', '$working_condition', '$temperature', '$number_of_data_send')";
		return SQLInsert($SQL);
	}
	
	else if($number_of_data_send == null) {
		$number_of_data_send = 0;
	}

	else {
		$SQL="INSERT INTO modules(name, description, number, type, working_condition , temperature, operating_time, number_of_data_send) VALUES('$name','$description','$number','$type', '$working_condition', '$temperature', '$operating_time', '$number_of_data_send')";
		return SQLInsert($SQL);
	}
	
}

function deleteModule($id) {

	$SQL="DELETE FROM modules WHERE id = $id ";

	return SQLDelete($SQL);
}


function newTemp($id,$newT) {

	$SQL="UPDATE modules SET temperature=$newT WHERE id = $id ";

	return SQLUpdate($SQL);
}


function addSimulation($id,$today,$sucess) {

	$SQL="INSERT INTO historical(description, success) VALUES('$today','$sucess')";
	return SQLInsert($SQL);
}

?>
