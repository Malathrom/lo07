<?php
include "header.php";
include "baseConnect.php";
$numCursus = $_GET["numCursus"];

$cursus = [];
for ($j = 1; $j < $_GET["countline"] + 1; $j++) {
    $element = [];
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


function addElement($database, $element, $numCursus, $numele) {

    $req = $database->prepare('UPDATE eleparcours SET numsem = :numsem, label = :label, sigle = :sigle, categorie = :categorie, affectation = :affectation, utt = :utt, profil = :profil, credit = :credit, resultat = :resultat WHERE numele = :numele and numCursus = :numCursus');
    $req->execute(array(
        'numsem' => $element[0],
        'label' => $element[1],
        'sigle' => $element[2],
        'categorie' => $element[3],
        'affectation' => $element[4],
        'utt' => $element[5],
        'profil' => $element[6],
        'credit' => $element[7],
        'resultat' => $element[8],
        'numele' => $numele,
        'numCursus' => $numCursus
    ));
}

for ($j = 0; $j < $_GET["countline"]; $j++) {
    addElement($database, $cursus[$j], $numCursus, $j+1);
}
?>

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été modifié.
        </div>

        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>
    </div>

</div>