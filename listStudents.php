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
            <tr>
                <td>45862</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>TC</td>
                <td>MPL</td>
                
            </tr>
            <tr>
                <td>45993</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>BR</td>
                <td>?</td>
            </tr>
            <tr>
                <td>86521</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>BR</td>
                <td>?</td>
            </tr>
            <?php afficheStudent($list) ?>



        </tbody>

    </table>

</div>