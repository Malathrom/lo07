<?php
include "header.php";
require_once 'baseConnect.php';
$numCursus = $_GET["numCursus"];
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

$requete2 = "select * from etudiant e, attachement a where e.numEtu=a.numEtu and a.numCursus=" . $numCursus;
$response2 = $database->query($requete2);
$data = $response2->fetch();
?>
<div class="container">
    <div class="page-header" style="text-align: center">
        <h1>Affichage cursus</h1>

        <h4><?php
            echo $data["nom"] . " " . $data["prenom"];
            ?></h4>
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
    <div class="row" style="text-align: center;">
        <div class="col-sm-4">
            <form class='form-signin' action='modify.php'>
                <input type=hidden name=numCursus value="  <?php echo $_GET["numCursus"]; ?> ">
                <button class='btn btn-primary btn-block' type='submit'>Modifier</button>
            </form>
        </div>
        <div class="col-sm-4">
            <form class='form-signin' action='copy.php'>
                <input type=hidden name=numCursus value=" <?php echo $_GET["numCursus"]; ?> ">
                <button class='btn btn-primary btn-block' type='submit'>Duplication</button>
            </form>
        </div>
        <div class="col-sm-4">
            <form class='form-signin' action='exportCursus.php'>
                <input type=hidden name=numCursus value=" <?php echo $_GET["numCursus"]; ?> ">
                <button class='btn btn-primary btn-block' type='submit'>Export</button>
            </form>
        </div>

    </div>
    <br>
    <div class="row" style="text-align: center;">
        <div class="col-sm-6">
            <form class='form-signin' action='reglement_actuel.php'>
                <input type=hidden name=numCursus value=" <?php echo $_GET["numCursus"]; ?> ">
                <button class='btn btn-success btn-lg btn-block' type='submit'>Vérifier validité cursus (reglement actuel)</button>
            </form>
        </div>
        <div class="col-sm-6">
            <form class='form-signin' action='reglement_futur.php'>
                <input type=hidden name=numCursus value=" <?php echo $_GET["numCursus"]; ?> ">
                <button class='btn btn-success btn-lg btn-block' type='submit'>Vérifier validité cursus (reglement futur)</button>
            </form>
        </div>

    </div> 
</div>
