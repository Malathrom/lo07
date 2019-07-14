<?php

include "header.php";
include "baseConnect.php";

$cursus = [];
for ($j = 1; $j < $_GET["countline"] + 1; $j++) {
    $element = [];
    array_push($element, $j);
    array_push($element, $_GET["numsem" . $j]);
    array_push($element, $_GET["label" . $j]);
    array_push($element, $_GET["sigle" . $j]);
    array_push($element, $_GET["categorie" . $j]);
    array_push($element, $_GET["affectation" . $j]);
    array_push($element, $_GET["utt" . $j]);
    array_push($element, $_GET["profil" . $j]);
    array_push($element, $_GET["credit" . $j]);
    array_push($element, $_GET["resultat" . $j]);
    array_push($cursus, $element);
}

$reponse = $database->query('SELECT MAX(numCursus) FROM cursus');
$donnees = $reponse->fetch();
$numCursus = $donnees[0] + 1;

$req = $database->prepare('INSERT INTO cursus(numCursus) VALUES( ? )');
$req->execute(array($numCursus));

$numEtu = $_GET["numEtu"];

$req = $database->prepare('INSERT INTO attachement(numEtu, numCursus) VALUES(?,?)');
$req->execute(array($numEtu, $numCursus));

function addElement($database, $element, $numCursus) {

    $req = $database->prepare('INSERT INTO eleparcours(numele, numsem, label, sigle, categorie, affectation, utt, profil, credit, resultat, numCursus) VALUES(:numele, :numsem, :label, :sigle, :categorie, :affectation, :utt, :profil, :credit, :resultat, :numCursus)');
    $req->execute(array(
        'numele' => $element[0],
        'numsem' => $element[1],
        'label' => $element[2],
        'sigle' => $element[3],
        'categorie' => $element[4],
        'affectation' => $element[5],
        'utt' => $element[6],
        'profil' => $element[7],
        'credit' => $element[8],
        'resultat' => $element[9],
        'numCursus' => $numCursus
    ));
}

for ($j = 0; $j < $_GET["countline"]; $j++) {
    addElement($database, $cursus[$j], $numCursus);
}
?>

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été ajouté à la base de données.
        </div>

        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>
    </div>

</div>