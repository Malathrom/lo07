

<?php include 'header.php'; ?>

<div class="container">

    <div class="mainText">
        <h1>Votre parcours</h1>
        <p class="lead">
        <div class="forceSize">
            <form class="form-signin" action="addStudentAction.php">
                <label>Numéro d'étudiant</label>
                <input type="text" name="numEtu" class="form-control" placeholder="Ex: 42563" required><br/>
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Ex: Dupont" required><br/>
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Ex: Gérard" required><br/>
                <label>Admission</label><br/>

                <label class="radio-inline"><input name="TC,BR" value="TC" type="radio" required>Tronc Commun</label>
                <label class="radio-inline"><input name="TC,BR" value="BR" type="radio" required>Branche</label><br/>

                <br/>
                <div class="form-group">
                    <label for="sel1">Filière:</label>
                    <select class="form-control" name="filiere" required>
                        <option value="?">?</option>
                        <option value='MPL'>MPL</option>
                        <option value="MSI">MSI</option>
                        <option value="MRI">MRI</option>
                        <option value="LIB">LIB</option>

                    </select>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
            </form>




            </p>
        </div>
    </div>
</div>

</body>
</html>
