<link rel="stylesheet" href="templates/css/form.css">
<?php

if($error!=NULL) {
    echo"<div class='alert alert-danger erreur' role='alert'>".
            $error.
        "</div>";
}
else {
    
}

?>

<form>
  <div class="form-container">
    <h2>Obligatoire</h2>
        <div class="form-group col-md-4">
            <label>Nom du module</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group col-md-4">
            <label>Description</label>
            <textarea class="form-control" name="description" rows="7"></textarea>
        </div>

        <div class="form-group col-md-4">
            <label>Numéro</label>
            <input type="number" class="form-control" name="number">
        </div>

        <div class="form-group col-md-4">
            <label>Type</label>
            <input type="text" class="form-control" name="type">
        </div>
    </div>  
    
    <div class="form-container">
    <h2>Optionnel</h2>
        <div class="form-group col-md-4">
            <label>État de marche :</label>
            <div><label>Éteint</label>
                <input type="radio" value="0" name="working_condition" checked>
            </div>
            <div><label>Allumer</label>
                <input type="radio" value="1" name="working_condition">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label>Température</label>
            <input type="number" class="form-control" name="temperature">
        </div>

        <div class="form-group col-md-4">
            <label>Temps de marche en minute</label>
            <input type="number" class="form-control" name="operating_time">
        </div>

        <div class="form-group col-md-4">
            <label>Nombres de données envoyées</label>
            <input type="number" class="form-control" name="number_of_data_send">
        </div>
           
        <input value="Fini" name="action" type="submit" class="buttons"/>
    </div>  
</form>