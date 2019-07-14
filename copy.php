<?php

include "header.php";
require_once 'baseConnect.php';
$numCursusOld = $_GET["numCursus"];

$reponse = $database->query('SELECT MAX(numCursus) FROM cursus');
$donnees = $reponse->fetch();
$numCursus = $donnees[0] + 1;

$req = $database->prepare('INSERT INTO cursus(numCursus) VALUES( ? )');
$req->execute(array($numCursus));

$requete2 = "INSERT INTO attachement (numEtu, numCursus) SELECT numEtu, $numCursus from attachement where numCursus = $numCursusOld";
$reponse = $database->query($requete2);

$requete = "INSERT INTO eleparcours(numele, numsem, label, sigle, categorie, affectation, utt, profil, credit, resultat, numCursus) SELECT numele, numsem, label, sigle, categorie, affectation, utt, profil, credit, resultat, $numCursus from eleparcours
where numCursus = $numCursusOld";
$reponse = $database->query($requete);
?>
<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été dupliqué.
        </div>

        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>
    </div>

</div>