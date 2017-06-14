<?php

include "header.php";
require_once 'baseConnect.php';
$numCursus = $_GET["numCursus"];
$requete = "DELETE FROM cursus WHERE numCursus = $numCursus;DELETE FROM eleparcours WHERE numCursus = $numCursus;DELETE FROM attachement WHERE numCursus = $numCursus;";
$reponse = $database->query($requete);

?>
<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été supprimé.
        </div>

        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>
    </div>

</div>