<?php include "header.php"; ?>

<div class="container">
    <br>
    <div class="panel panel-primary" style="text-align: center;">
        <div class="panel-heading">
            <h3 class="panel-title">Ajouter un nouveau Cursus</h3>
        </div>
        <div class="panel-body">

            <form action="importCursus.php" method="post" enctype="multipart/form-data">



                <label class="btn btn-primary btn-file">Selectionner fichier CSV<input class="btn"  type="file" name="file" id="file" /></label>
                <label class="btn btn-success btn-file">Envoyer<input type="submit" name="submit" style="display: none;" /></label>

            </form>

        </div>
    </div>

</div>