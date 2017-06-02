

<?php include 'header.php'; ?>



<script type='text/javascript' src="cursus.js"></script>




<div class="container">

    <div class="mainText">
        <h1>Votre parcours</h1><br>
    </div>


    <form class="form-signin" action="action.php">

        <input id="countline" name="countline" type="hidden" />
        <script> document.getElementById('countline').value = count;</script>
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

                <tr>

                    <td>1</td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="numsem1"></td>
                    <td><input type="text" class="form-control input-sm" style="width: 80%;" name="label1"></td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="sigle1"></td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="categorie1"></td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="affectation1"></td>
                    <td><select class="form-control" name="utt1" style="width: 115%">
                            <option>Oui</option>
                            <option>Non</option>
                        </select></td>
                    <td><select class="form-control" name="profil1" style="width: 110%">
                            <option>Oui</option>
                            <option>Non</option>
                        </select></td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="credit1"></td>
                    <td><input type="text" class="form-control input-sm" style="width: 40%;" name="resultat1"></td>

                </tr>


            </tbody>
            <tbody id="container"/>

        </table>
        <button id="trigger" onclick="addFields()" class="btn btn-info" type="button">Ajouter ligne</button>






        <div class="forceSize">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
        </div>
    </form>




</p>


<div class="well" style="text-align: left">
    <p><ul class="list-group">
        <li class="list-group-item"><b>Num Semestre :</b> numéro de votre semestre à l'UTT</li>
        <li class="list-group-item"><b>Label Semestre :</b> sigle d'une branche(TC,ISI,SRT,...) et numéro du semestre dans cette branche</li>
        <li class="list-group-item"><b>Sigle : </b>sigle d’une UE, label d’un stage, ...</li>
        <li class="list-group-item"> <b>Catégorie :</b> CS, TM, EC,HT, ME, ST, SE, HP, NPML,...</li>
        <li class="list-group-item">  <b>Affectation :</b> à quelle partie du cursus doivent être affectés les crédits associés à l’élément de formation.</li>
        <li class="list-group-item">  <b>Utt? : </b>fait à l'UTT(Y) ou hors de l'UTT(N).</li>
        <li class="list-group-item">  <b>Profil :</b> Y (oui) ou N (non), ce qui permet de savoir si l’élément de formation appartient au profil.
            de la branche ou de la filière. Cet attribut permet de valider (ou pas) les crédits du TCBR et de
            la filière.</li>
        <li class="list-group-item">    <b>Credit :</b> nombre de crédits obtenus.</li>
        <li class="list-group-item">     <b>Résultat :</b> A, ...F, ABS, RES, ADM, ...</li>
        </p></ul>
</div>
</div>



</body>
</html>
