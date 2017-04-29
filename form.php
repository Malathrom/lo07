<?php ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Les Lepenistes</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="cover.css" rel="stylesheet">

    </head>

    <body>

        <div class="site-wrapper">

            <div class="site-wrapper-inner">

                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner">
                            <h3 class="masthead-brand">UTT Parcours</h3>
                            <nav>
                                <ul class="nav masthead-nav">
                                    <li class="active"><a href="#">Home</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <form class="form-signin" action="action.php">
                        <h2 class="form-signin-heading">Votre parcours</h2><br/>

                        <label>Numéro d'étudiant</label>
                        <input type="text" name="numEtu" class="form-control" placeholder="Ex: 42563" required><br/>
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Ex: Dupont" required><br/>
                        <label>Prénom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Ex: Gérard" required><br/>
                        <label>Admission</label><br/>

                        <label class="radio-inline"><input name="TC,BR" value="TC" type="radio">Tronc Commun</label>
                        <label class="radio-inline"><input name="TC,BR" value="BR" type="radio">Branche</label><br/>
                        <!--
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio">Option 1</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="optradio">Option 2</label>
                                                </div>
                                                <div class="radio disabled">
                                                    <label><input type="radio" name="optradio" disabled>Option 3</label>
                                                </div> -->
                        <br/>
                        <div class="form-group">
                            <label for="sel1">Filière:</label>
                            <select class="form-control" name="filiere">
                                <option value="?">?</option>
                                <option value='MPL'>MPL</option>
                                <option value="MSI">MSI</option>
                                <option value="MRI">MRI</option>
                                <option value="LIB">LIB</option>

                            </select>
                        </div>
                        <!--
                         <label>Email address</label>
                         <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus><br/>
 
                         <label>Password</label>
                         <input type="password" id="inputPassword" class="form-control" placeholder="Password" ><br/>
 
                         <div class="checkbox">
                             <label>
                                 <input type="checkbox" value="remember-me"> Remember me
                             </label>
                         </div>-->
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
                    </form>


                </div>
            </div>
        </div>
    </body>
</html>

