<link rel="stylesheet" href="templates/css/accueil.css">
<script>


// fonction qui récupere l'id du bouton ainsi que ce que le bouton fait et redirige vers la page 
// du controleur avec comme paramètre l'action à faire (supprimer, simuler, ou modifier)
// et en second paramètre l'id du module concerné 
function Button(refBtn) {

    var id = refBtn.id;
    var value = refBtn.value;
    var temperature = refBtn.name;

    document.location.href="controleur.php?action="+value+"&idButton="+id+"&temperature="+temperature;
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
$answer = $bdd->query('SELECT * FROM modules');
?>
<div class="containerModules">
<?php
while ($datas = $answer->fetch())
{
?>
<div class="modules">
    <h1 class="modules-title"><?php echo $datas['name']; ?></h1>
    <div>
        <p><?php echo $datas['description']; ?></p>
    </div>
    <ul>
        <li>Numéro de série : <?php echo $datas['number']; ?></li>
        <li>C'est un module de type : <?php echo $datas['type']; ?></li>
        <li><?php 
            if($datas['working_condition']==0) {
                echo "État de marche : éteint"; 
            } else {
                echo "État de marche : allumer"; 
            }
        ?></li>
        <li><?php
            if($datas['temperature'] == null) {
                echo "Pas de température";
            } else {
                echo "Température de : ".$datas['temperature']." °";
            }
        ?></li>
        <li><?php
            if($datas['operating_time'] == null) {
                echo "N'a pas fonctionner";
            } else {
                echo "A fonctionner : ".$datas['operating_time']." minutes";
            }
        ?></li>
        <li><?php
            if($datas['number_of_data_send'] == 0 ) {
                echo "N'a pas envoyé de données";
            } else {
                echo "A envoyer : ".$datas['number_of_data_send']." données";
            }
        ?></li>
    </ul>
    <div class="containerButtons">
        <input type="button" class="buttons" id="<?php echo $datas['id']; ?>"  onClick=Button(this) value="Modifier la température">
        <input type="button" class="buttons" id="<?php echo $datas['id']; ?>" name="<?php echo $datas['temperature']; ?>"  onClick=Button(this) value="Simuler">
        <input type="button" class="buttons" id="<?php echo $datas['id']; ?>" onClick=Button(this) value="Supprimer">
    </div>
</div>



<?php
}


?>
<div class="addModule">
<input type="submit" class="buttons" name="action" value="Ajouter un module"/>
</div>
<?php   
$answer2 = $bdd->query('SELECT * FROM historical');
?>
<?php
while ($datas2 = $answer2->fetch())
{
?>



<div class="historical">
        <p>date : <?php echo $datas2['description']; ?></p>

        <?php 
            if($datas2['success']==0) {
                echo "Erreur de simulation"; 
            } else {
                echo "Success de la simulation"; 
            }
}







$answer->closeCursor(); 
$answer2->closeCursor(); 
?>
</div>
