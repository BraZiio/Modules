<link rel="stylesheet" href="templates/css/simulation.css">
<?php

// la simulation fonction si la température du module est comprise entre 15 et 25
if($valid==0) {
    echo"<div class='alert alert-danger erreur' role='alert'>
            Erreur ! Pas de température renseigner ou température en dessous de 15 ou au dessus de 25
        </div>";
}
else {
    echo"<div class='alert alert-success erreur' role='alert'>
            Succès ! La température est bonne !
        </div>
        <div class='gif'>
            <img alt='confeti' src='ressources/gif.gif'>
        </div>";
}

?>
<div class="simulation-input">
    <input value="Retour" name="action" type="submit" class="buttons"/>
</div>


