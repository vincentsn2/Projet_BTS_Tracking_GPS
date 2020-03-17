<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleFormulaire.css">
        <?php 
            include 'fonction.php'; 
        ?>
    <head>

    <body>
        <div class="container">
            <input type="radio" class="login-radio" name="login_registration" id="login" checked>
            <input type="radio" class="reg-radio" name="login_registration" id="signUp">

            <div class="login">
                <h1 class="title">Connexion</h1>
                <form action="index.php" method="POST">
                    <div class="input-control">
                        <label for="email">Login</label>
                        <div class="espace"></div>
                        <input type="text" id="loginConnexion" name="loginConnexion" placeholder="Entrez votre nom d'utilisateur" required>
                    </div>

                    <div class="input-control">
                        <label for="password">Mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" id="motDePasseConnexion" name="motDePasseConnexion" placeholder="Entrez votre mot de passe" required>
                    </div>

                    <div class="input-control">
                        <button type="submit" id="connexion" name="connexion">Se connecter</button>
                    </div>
                </form>

                <?php
                    if(isset($_POST['connexion']))
                    {
                        $login=$_POST['loginConnexion'];
                        $mdp=$_POST['motDePasseConnexion'];
                        
                        Connexion($login,$mdp);
                    }
		        ?>

                <div class="footer">
                    <div><label for="signUp"><span>Inscription</span></label></div>
                    <div><a href="#">Mot de passe oublié?</a></div>
                </div>
            </div>
            <div class="register">
                <h1 class="title">Inscription</h1>
                <form action="" method="POST">
                    <div class="input-control">
                        <label for="name">Login</label>
                        <div class="espace"></div>
                        <input type="text" id="loginInscription" name="loginInscription" placeholder="Entrez votre nom d'utilisateur" required>
                    </div>
                    <div class="input-control">
                        <label for="gender">Catégorie du compte</label>
                        <div class="espace"></div>
                        <select id="compte" name="compte">
                        <option value="0">Compte utilisateur</option>
                        <option value="1">Compte administrateur</option>
                        </select>
                    </div>
                    <div class="input-control">
                        <label for="password2">Mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" placeholder="Entrez votre mot de passe" id="motDePasseInscription1" name="motDePasseInscription1" required>
                    </div>
                    <div class="input-control">
                        <label for="password2">Confirmation mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" placeholder="Confirmez votre mot de passe" id="motDePasseInscription2" name="motDePasseInscription2" required>
                    </div>
                    <div class="input-control">
                        <input type="checkbox" id="engagement" name="engagement" required> <label for="agreement">J'ai lu et j'accepte les termes et conditions</a></label>
                    </div>
                    <div class="input-control">
                        <button type="submit" class="sing-up" id="inscription" name="inscription">S'inscrire</button>
                    </div>
                </form>
                <div class="footer">
                    <div><label for="login"><span class="sign-in">Connexion</span></label></div>
                </div>
            </div>

            <?php
                if((isset($_POST['inscription'])) && ($_POST['motDePasseInscription1'] == $_POST['motDePasseInscription2']))
                {
                    $login=$_POST['loginInscription'];
                    $mdp=$_POST['motDePasseInscription1'];
                    $mdp1=$_POST['motDePasseInscription2'];
                    $typeCompte=$_POST['compte'];
                        
                    Inscription($login,$mdp,$typeCompte);
                }
                else
                {
                    echo "<script type='text/javascript'>";
                    echo "alert('Veuillez recommencer l'inscription en suivant les instructions.')";  
                    echo "</script>"; 
                }
		    ?>
        </div>
    </body>
</html>