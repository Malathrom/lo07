<?php

include "header.php";
require_once 'baseConnect.php';

if (isset($_POST["submit"])) {

    if (isset($_FILES["file"])) {

        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {
            //if file already exists
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                //Store file in directory "upload" with the name of "uploaded_file.txt"
                $storagename = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
            }
        }
    } else {
        echo "No file selected <br />";
    }
}

function getCursusCsV($csv) {
    if (($handle = fopen($csv, "r")) !== FALSE) {
        $cursus = [];
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            if ($data[0] == "EL") {
                $element = [];
                for ($c = 1; $c < $num; $c++) {
                    array_push($element, $data[$c]);
                }
                array_push($cursus, $element);
            }
        }
        fclose($handle);
    }
    return $cursus;
}

function getEtuCsV($csv) {
    if (($handle = fopen($csv, "r")) !== FALSE) {
        $etu = [];
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if ($data[0] == "ID") {

                array_push($etu, $data[1]);
            }
            if ($data[0] == "NO") {

                array_push($etu, $data[1]);
            }
            if ($data[0] == "PR") {

                array_push($etu, $data[1]);
            }
            if ($data[0] == "AD") {

                array_push($etu, $data[1]);
            }
            if ($data[0] == "FI") {

                array_push($etu, $data[1]);
            }
        }
        fclose($handle);
    }
    return $etu;
}
$csv="upload/" . $_FILES["file"]["name"];
$cursus = getCursusCsV($csv);

$reponse = $database->query('SELECT MAX(numCursus) FROM cursus');
$donnees = $reponse->fetch();
$numCursus = $donnees[0] + 1;

$req = $database->prepare('INSERT INTO cursus(numCursus) VALUES( ? )');
$req->execute(array($numCursus));



for ($j = 0; $j < count($cursus); $j++) {
    $element = $cursus[$j];
    $req = $database->prepare('INSERT INTO eleparcours(numele, numsem, label, sigle, categorie, affectation, utt, profil, credit, resultat, numCursus) VALUES(:numele, :numsem, :label, :sigle, :categorie, :affectation, :utt, :profil, :credit, :resultat, :numCursus)');
    $req->execute(array(
        'numele' => $j,
        'numsem' => $element[0],
        'label' => $element[1],
        'sigle' => $element[2],
        'categorie' => $element[3],
        'affectation' => $element[4],
        'utt' => $element[5],
        'profil' => $element[6],
        'credit' => $element[7],
        'resultat' => $element[8],
        'numCursus' => $numCursus
    ));
}

$etudiant= getEtuCsV($csv);



function addStudent($database, $numEtu, $nom, $prenom, $admission, $filiere) {

    $req = $database->prepare('INSERT INTO etudiant(numEtu, nom, prenom, admission, filiere) VALUES(:numEtu, :nom, :prenom, :admission, :filiere)');
    $req->execute(array(
        'numEtu' => $numEtu,
        'nom' => $nom,
        'prenom' => $prenom,
        'admission' => $admission,
        'filiere' => $filiere,
    ));
}
$numEtu =$etudiant[0];

$reponse2 = $database->query('SELECT * FROM etudiant WHERE numEtu=' . $numEtu);
$donnees2 = $reponse2->fetch();
$error=false;
print_r($donnees2);
echo $donnees2["numEtu"]==$numEtu;
if ($donnees2["numEtu"]=$numEtu){
    $error=true;
}else{
addStudent($database, $etudiant[0], $etudiant[1], $etudiant[2], $etudiant[3], $etudiant[4]);
}



$req = $database->prepare('INSERT INTO attachement(numEtu, numCursus) VALUES(?,?)');
$req->execute(array($numEtu, $numCursus));
?>

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Le cursus a été ajouté à la base de données.
        </div>
        <?php if ($error){
            echo '<div class="alert alert-danger" role="alert"><strong>Doublon détécté</strong> L\'etudiant a déja été ajouté</div>';
        }?>

        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>
    </div>

</div>