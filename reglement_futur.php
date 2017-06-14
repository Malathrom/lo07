<?php
include "header.php";
require_once "baseConnect.php";
$numCursus = $_GET["numCursus"];
$requete = 'SELECT * FROM eleparcours WHERE numCursus =' . $numCursus;
$reponse = $database->query($requete);
$cursus = [];
while ($data = $reponse->fetch()) {
    array_push($cursus, $data);
};
$CS_TCBR = 0;
$CS_FCBR = 0;
$TM_TCBR = 0;
$TM_FCBR = 0;
$CS_UTT = 0;
$TM_UTT = 0;
$ST_TCBR = 0;
$ST_FCBR = 0;
$EC = 0;
$ME = 0;
$CT = 0;
$NPML = false;
$SE = false;
$total = 0;
foreach ($cursus as $key => $element) {
    if ($element["resultat"] != "F" && $element["resultat"] != "ABS" && $element["resultat"] != "RES") {
        $total += $element["credit"];
        switch ($element["categorie"]) {
            case "CS":
                if ($element["utt"] == "Y") {
                    $CS_UTT += $element["credit"];
                }
                if ($element["affectation"] == "TCBR") {
                    $CS_TCBR += $element["credit"];
                } else {
                    $CS_FCBR += $element["credit"];
                }
                break;
            case "TM":
                if ($element["utt"] == "Y") {
                    $TM_UTT += $element["credit"];
                }
                if ($element["affectation"] == "TCBR") {
                    $TM_TCBR += $element["credit"];
                } else {
                    $TM_FCBR += $element["credit"];
                }
                break;
            case "ST":
                if ($element["affectation"] == "TCBR") {
                    $ST_TCBR += $element["credit"];
                } else {
                    $ST_FCBR += $element["credit"];
                }
                break;
            case "EC":
                $EC += $element["credit"];
                break;
            case "ME":
                $ME += $element["credit"];
                break;
            case "CT":
                $CT += $element["credit"];
                break;
            case "NPML":
                $NPML = true;
                break;
            case "SE":
                $SE = true;
                break;
        }
    }
}
$erreur = false;
$message = "";
if ($CS_TCBR + $TM_TCBR < 42) {
    $erreur = true;
    $message .= "CS+TM TCBR inférieur à 42.<br>";
}
if ($CS_FCBR + $TM_FCBR < 18) {
    $erreur = true;
    $message .= "CS+TM FCBR inférieur à 18.<br>";
}
if ($CS_TCBR + $CS_FCBR < 24) {
    $erreur = true;
    $message .= "CS BR inférieur à 24.<br>";
}
if ($TM_TCBR + $TM_FCBR < 24) {
    $erreur = true;
    $message .= "TM BR inférieur à 24.<br>";
}
if ($CS_TCBR + $TM_TCBR + $CS_FCBR + $TM_FCBR < 84) {
    $erreur = true;
    $message .= "CS+TM BR inférieur à 84.<br>";
}
if ($ST_TCBR < 30) {
    $erreur = true;
    $message .= "ST TCBR inférieur à 30.<br>";
}
if ($ST_FCBR < 30) {
    $erreur = true;
    $message .= "ST FCBR inférieur à 30.<br>";
}
if ($EC < 12) {
    $erreur = true;
    $message .= "EC inférieur à 12.<br>";
}
if ($ME < 4) {
    $erreur = true;
    $message .= "ME inférieur à 4.<br>";
}
if ($CT < 4) {
    $erreur = true;
    $message .= "CT inférieur à 4.<br>";
}
if ($ME + $CT < 16) {
    $erreur = true;
    $message .= "ME+CT inférieur à 16.<br>";
}
if ($CS_UTT + $TM_UTT < 60) {
    $erreur = true;
    $message .= "CS+TM à l'UTT inférieur à 60.<br>";
}
if ($SE == false) {
    $erreur = true;
    $message .= "Pas de SE.<br>";
}
if ($NPML == false) {
    $erreur = true;
    $message .= "Pas de NPML.<br>";
}
if ($total < 180) {
    $erreur = true;
    $message .= "Total inférieur à 180.<br>";
}
?>
<div class="container">

    <div class="forceSize" style="text-align: center">
        <?php
        if ($erreur) {
            echo "<div class='alert alert-danger' role='alert'><strong>Erreur!<br></strong>" . $message . "</div>";
        } else {
            echo "<div class='alert alert-success' role='alert'><strong>Bravo!<br></strong>Votre cursus est valide.</div>";
        }
        ?>


        <div class="panel-body">
            <a href="index.php" class="btn btn-lg btn-primary">Retour liste cursus</a>
        </div>

    </div>

</div>