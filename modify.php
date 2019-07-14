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
$GLOBALS["countline"] = 0;

function afficheCursus($list) {
    $count = 1;
    foreach ($list as $key => $etudiant) {
        echo "<tr>";
        echo "<td name=" . "numele" . $count . ">" . $count . "</td>";
        echo "<input id='numele' name='numele" . $count . "' type='hidden' value=" . $count . " />";
        echo "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" . "numsem" . $count . " value=" . $etudiant[0] . "></td>";
        echo "<td><input type='text' class='form-control input-sm' style='width: 80%;'name=" . "label" . $count . " value=" . $etudiant[1] . "></td>";
        echo "<td><input type='text' class='form-control input-sm' style='width: 60%;'name=" . "sigle" . $count . " value=" . $etudiant[2] . "></td>";
        echo "<td><input type='text' class='form-control input-sm' style='width: 50%;'name=" . "categorie" . $count . " value=" . $etudiant[3] . "></td>";
        echo "<td><select class='form-control' name='affectation" . $count . "' style='width: 115%'><option>TC</option><option>BR</option><option>TCBR</option><option>FCBR</option></select></td>";
        echo "<td><select class='form-control'name=" . "utt" . $count . " style='width: 115%'><option>Y</option><option>N</option></select></td>";
        echo "<td><select class='form-control'name=" . "profil" . $count . " style='width: 110%'><option>Y</option><option>N</option></select></td>";
        echo "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" . "credit" . $count . " value=" . $etudiant[7] . "></td>";
        echo "<td><input type='text' class='form-control input-sm' style='width: 40%;'name=" . "resultat" . $count . " value=" . $etudiant[8] . "></td>";
        echo "</tr>";
        $count++;
        $GLOBALS["countline"] ++;
    }
}

$requete2 = "select * from etudiant e, attachement a where e.numEtu=a.numEtu and a.numCursus=" . $numCursus;
$response2 = $database->query($requete2);
$data = $response2->fetch();
?>

<div class="container">
    <div class="page-header" style="text-align: center">
        <h1>Modifier cursus</h1>

        <h4><?php
            echo $data["nom"] . " " . $data["prenom"];
            ?></h4>
    </div>

    <form class="form-signin" action="modifyAction.php">

        <input id="numele" name="numele1" type="hidden" value=1 />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
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

                <?php afficheCursus($list);
                ?>



            </tbody>
            <tbody id="container"/>
        </table>
        <script>
            var offset =<?php echo $GLOBALS["countline"]-1 ?>;
        </script>
        <script type='text/javascript' src="cursus.js"></script>
        <script> document.getElementById('countline').value = count;</script>
        <input id="countline" name="countline" type="hidden" />
        <script> document.getElementById('countline').value = count;</script>
        <button id="trigger" onclick="addFields()" class="btn btn-info" type="button">Ajouter ligne</button>
        <div class="forceSize">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
        </div>
        <input type=hidden name=numCursus value=<?php echo $numCursus ?>>
    </form>

</div> 
