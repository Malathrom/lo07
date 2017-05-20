<?php

require_once 'baseConnect.php';



/* Créé une liste d'étu à partir de la bdd */

function listStudent($list) {
    $list = [];
    $requete = "select * from etudiant";
    $response = $database->query($requete);
    while ($data = $response->fetch()) {
        echo "<li>" . " id = " . $data["nom"] . " name = " . $data["label"] . "</br>" . "</li>";
    }
}

function afficheStudent($list) {
    foreach ($list as $key => $etudiant) {
        foreach ($etudiant as $value) {
            
        }
    }
}
