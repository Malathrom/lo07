<?php
include "header.php";
require_once 'baseConnect.php';
$numCursus = $_GET["numCursus"];
$requete = "select * from eleparcours where numCursus = $numCursus order by numsem";
$response = $database->query($requete);

$cursus = [];
while ($data = $response->fetch()) {
    array_push($cursus, [$data["numsem"], $data["label"], $data["sigle"], $data["categorie"], $data["affectation"], $data["utt"], $data["profil"], $data["credit"], $data["resultat"]]);
}

$requete2 = "select e.numEtu, nom, prenom, admission, filiere from etudiant e, attachement a where e.numEtu=a.numEtu and a.numCursus = $numCursus";
$response2 = $database->query($requete2);
$etu = [];
while ($data = $response2->fetch()) {
    array_push($etu, $data["numEtu"], $data["nom"], $data["prenom"], $data["admission"], $data["filiere"]);
}

/* $etu doit être un tableau de 5 éléments.
 * $cursus doit être un tableau de tableaux de 9 éléments.
 */

function exportCursus($cursus, $etu) {
    $nom = $etu[1];
    $prenom = $etu[2];
    $file = "export/" . $nom . '_' . $prenom . '.csv';
    $fp = fopen($file, 'w');
    $nb = 1;
    if ($data = fgetcsv($fp, 1000, ";") == FALSE) {
        $etu_csv = [
            array('ID', $etu[0], '', '', '', '', '', '', '', ''),
            array('NO', $etu[1], '', '', '', '', '', '', '', ''),
            array('PR', $etu[2], '', '', '', '', '', '', '', ''),
            array('AD', $etu[3], '', '', '', '', '', '', '', ''),
            array('FI', $etu[4], '', '', '', '', '', '', '', '')
        ];
        foreach ($etu_csv as $fields) {
            fputcsv($fp, $fields, ';');
        }
        fputcsv($fp, array('==', 's_seq', 's_label', 'sigle', 'categorie', 'affectation', 'utt', 'profil', 'credit', 'resultat'));
        foreach ($cursus as $fields) {
            array_unshift($fields, 'EL');
            fputcsv($fp, $fields, ";");
        }
        fputcsv($fp, array('END', '', '', '', '', '', '', '', '', ''));
    } else {
        $file = $nom . '_' . $prenom . '(' . $nb . ').csv';
        $fp = fopen($file, 'w');
        while ($data = fgetcsv($fp, 1000, ";") == TRUE) {
            $nb += 1;
        }
        $etu_csv = [
            array('ID', $etu[0], '', '', '', '', '', '', '', ''),
            array('NO', $etu[1], '', '', '', '', '', '', '', ''),
            array('PR', $etu[2], '', '', '', '', '', '', '', ''),
            array('AD', $etu[3], '', '', '', '', '', '', '', ''),
            array('FI', $etu[4], '', '', '', '', '', '', '', '')
        ];
        foreach ($etu_csv as $fields) {
            fputcsv($fp, $fields, ';');
        }
        fputcsv($fp, array('==', 's_seq', 's_label', 'sigle', 'categorie', 'affectation', 'utt', 'profil', 'credit', 'resultat'));
        foreach ($cursus as $fields) {
            array_unshift($fields, 'EL');
            fputcsv($fp, $fields, ";");
        }
        fputcsv($fp, array('END', '', '', '', '', '', '', '', '', ''));
    }
}

exportCursus($cursus, $etu);
$lien = "export/" . $etu[1] . '_' . $etu[2] . '.csv';
?>

<div class="container">

    <div class="forceSize" style="text-align: center">
        <div class="alert alert-success" role="alert">
            <strong>Bravo!</strong> Export réalisé!
        </div>
        <div class="panel-body">
            <a class="btn btn-primary btn-lg" href="<?php echo $lien ?>">
                Télécharger fichier CSV
            </a>
        </div>

    </div>

</div>