<?php include "header.php";
require_once 'baseConnect.php';
$numCursus = 15;
$requete = "select * from eleparcours where numCursus = $numCursus order by numsem";
$response = $database->query($requete);

$list = [];
while ($data = $response->fetch()) {
    array_push($list, [$data["numsem"], $data["label"], $data["sigle"], $data["categorie"], $data["affectation"], $data["utt"], $data["profil"], $data["credit"], $data["resultat"]]);
}

function afficheCursus($list) {
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
                <th>Num Semestre</th>
                <th>Label Semestre</th>
                <th>Sigle</th>
                <th>Catégorie</th>
                <th>Affectation</th>
                <th>Utt?</th>
                <th>Profil</th>
                <th>Credit</th>
                <th>Résultat</th>
            </tr>
        </thead>
        <tbody>

            <?php afficheCursus($list) ?>



        </tbody>

    </table>

</div>