<?php
include "header.php";
require_once 'baseConnect.php';

/* Créé une liste d'étu à partir de la bdd */
$list = [];
$requete = "select * from etudiant";
$response = $database->query($requete);
while ($data = $response->fetch()) {
    array_push($list, [$data["numEtu"], $data["nom"], $data["prenom"], $data["admission"], $data["filiere"]]);
}

function afficheStudent($list) {
    foreach ($list as $key => $etudiant) {
        echo "<tr>";
        foreach ($etudiant as $value) {
            echo "<th>" . $value . "</th>";
        }
        echo "</tr>";
    }
}
?>
<div class="container">
    <div class="page-header" style="text-align: center">
        <h1>Liste étudiants</h1>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro étudiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Admission</th>
                <th>Filière</th>

            </tr>
        </thead>
        <tbody>

            <?php afficheStudent($list) ?>



        </tbody>

    </table>

    <a href="addStudent.php" class="btn btn-lg btn-primary">Ajouter Etudiant</a>
</div>