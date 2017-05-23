

<?php include 'header.php'; ?>

<div class="container">

  <div class="mainText">
      <h1>Votre parcours</h1>
      <div class="well">
          <p>
Numéro Semestre: numéro de votre semestre à l'UTT
Label Semestre: sigle d'une branche(TC,ISI,SRT,...) et numéro du semestre dans cette branche
Sigle: sigle d’une UE, label d’un stage, ...
Catégorie:CS, TM, EC,HT, ME, ST, SE, HP, NPML,...
Affectation: à quelle partie du cursus doivent être affectés les crédits associés à l’élément de formation
Utt?: fait à l'UTT(Y) ou hors de l'UTT(N)
Profil: Y (oui) ou N (non), ce qui permet de savoir si l’élément de formation appartient au profil
de la branche ou de la filière. Cet attribut permet de valider (ou pas) les crédits du TCBR et de
la filière.
Credit: nombre de crédits obtenus
Résultat:A, ...F, ABS, RES, ADM, ...
          </p>
      </div>
      <p class="lead">
      <div >
          <form class="form-signin" action="addStudentAction.php">

              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Num</th>
                          <th>Numéro Semestre</th>
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




                    </tbody>

                </table>






                <div class="forceSize">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
                </div>
            </form>




            </p>
        </div>
    </div>
</div>

</body>
</html>
