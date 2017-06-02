<?php
include "header.php";
include "baseConnect.php";


        
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
print_r($cursus);







function addCursus($database, $numEtu, $nom, $prenom, $admission, $filiere) {

    $req = $database->prepare('INSERT INTO etudiant(numEtu, nom, prenom, admission, filiere) VALUES(:numEtu, :nom, :prenom, :admission, :filiere)');
    $req->execute(array(
        'numEtu' => $numEtu,
        'nom' => $nom,
        'prenom' => $prenom,
        'admission' => $admission,
        'filiere' => $filiere,
    ));
}
/*
addCursus($database, $_GET["numEtu"], $_GET["nom"], $_GET["prenom"], $_GET["TC,BR"], $_GET["filiere"]);*/
?>

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été ajouté à la base de données.
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Consulter liste cursus</h3>
            </div>
            <div class="panel-body">
                <a href="listStudents.php" class="btn btn-lg btn-default">Liste cursus</a>
            </div>
        </div>
    </div>

</div>