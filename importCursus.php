<?php

include "header.php";
require_once 'baseConnect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

$cursus = getCursusCsV("test/PRIOR_beatrice.csv");

$reponse = $database->query('SELECT MAX(numCursus) FROM cursus');
$donnees = $reponse->fetch();
$numCursus = $donnees[0] + 1;

$req = $database->prepare('INSERT INTO cursus(numCursus) VALUES( ? )');
$req->execute(array($numCursus));

function addElement($database, $element, $numCursus) {

    
}

for ($j = 0; $j < count($cursus); $j++) {
    $element=$cursus[$j];
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
?>