<link rel="stylesheet" href="templates/css/modifTemp.css">
<script>

function Button(refBtn) {

    var id = refBtn.id;
    var newT = document.getElementById("newT").value;
    //console.log(newT);
    document.location.href="controleur.php?action=newTemperature&idButton="+id+"&newT="+newT;
}

</script>


<?php

// connection a la bdd
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Webreathe_Le_Breton;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// si d'erreur
        die('Erreur : '.$e->getMessage());
}


// Recupération des données
$answer = $bdd->query("SELECT * FROM modules WHERE id='$idModule'");
?>
<?php
$datas = $answer->fetch();
?>
<div class="modifTemp">
    <h1 class="temp-title"><?php echo $datas['name']; ?></h1>
    <div class="temperature"><?php
        if($datas['temperature'] == null) {
            echo "Pas de température";
        } else {
            echo "La température est de : ".$datas['temperature']." °";
        }
    ?></div>
    <input type="number" name="newTemp" id="newT" class="temp-input">
    <input type="button" class="buttons" id="<?php echo $idModule ?>" onClick=Button(this) value="Changer">
</div>
<?php
$answer->closeCursor(); // Termine le traitement de la requête
?>
