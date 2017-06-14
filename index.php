<?php include 'header.php'; ?>

<div class="container">
    <div style="max-width: 600px;
         padding: 15px;
         margin: 0 auto;">
        <img src="utt.jpg" data-src="holder.js/200x200" class="img-thumbnail">
    </div>






    <?php
    require_once 'baseConnect.php';
    $requete = "select * from cursus c, attachement a, etudiant e where c.numCursus=a.numCursus and a.numEtu=e.numEtu order by c.numCursus";
    $response = $database->query($requete);
    $list = [];
  
    while ($data = $response->fetch()) {
        array_push($list, [$data["numCursus"], $data["numEtu"], $data["nom"], $data["prenom"]]);
        print_r($data);
        echo "<br>";
    }

    function afficheCursus($list) {
        foreach ($list as $key => $etudiant) {
            echo "<tr>";
            foreach ($etudiant as $value) {
                echo "<th>" . $value . "</th>";
            }
            echo "<th>";
            echo "<form class='form-signin' action='modify.php'>";
            echo "<input type=hidden name=numCursus value=" . $etudiant[0] . ">";
            echo "<button class='btn btn-primary' type='submit'>Modifier</button>";
            echo "</form>";
            echo "</th>";

            echo "<th>";
            echo "<form class='form-signin' action='viewCursus.php'>";
            echo "<input type=hidden name=numCursus value=" . $etudiant[0] . ">";
            echo "<button class='btn btn-success btn-block' type='submit'>Voir</button>";
            echo "</form>";
            echo "</th>";


            echo "</tr>";
        }
    }
    ?>


    <div class="page-header" style="text-align: center">
        <h1>Liste Cursus</h1>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro Cursus</th>
                <th>Numéro étudiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Modifier Cursus</th>

                <th>Voir Cursus</th>

            </tr>
        </thead>
        <tbody>

<?php afficheCursus($list) ?>



        </tbody>

    </table>

    <br><br><br><br>

    <div class="row" style="text-align: center">
        <div class="col-sm-5">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter un nouveau Cursus</h3>
                </div>
                <div class="panel-body">
                    <a href="addCursus.php" class="btn btn-lg btn-primary">Via formulaire</a>
                    <a href="importCursusForm.php" class="btn btn-lg btn-primary">Via import CSV</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajouter un étudiant</h3>
                </div>
                <div class="panel-body">
                    <a href="addStudent.php" class="btn btn-lg btn-primary">Ajouter étudiant</a><br>
                </div>

            </div>

        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Consulter liste étudiants</h3>
                </div>
                <div class="panel-body">
                    <a href="listStudents.php" class="btn btn-lg btn-primary">Liste étudiants</a>
                </div>
            </div>

        </div>

    </div>






</div>
</body>
</html>
