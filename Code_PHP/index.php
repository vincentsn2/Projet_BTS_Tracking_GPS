<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleFormulaire.css">
    <head>

    <body>
        <div class="container">
            <input type="radio" class="login-radio" name="login_registration" id="login" checked>
            <input type="radio" class="reg-radio" name="login_registration" id="signUp">

            <div class="login">
                <h1 class="title">Connexion</h1>
                <form action="" method="POST">
                    <div class="input-control">
                        <label for="email">Login</label>
                        <div class="espace"></div>
                        <input type="text" id="loginConnexion" placeholder="Entrez votre nom d'utilisateur" required>
                    </div>

                    <div class="input-control">
                        <label for="password">Mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" id="motDePasseConnexion" placeholder="Entrez votre mot de passe" required>
                    </div>

                    <div class="input-control">
                        <button type="submit" id="connexion">Se connecter</button>
                    </div>
                </form>

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
                        <input type="text" id="loginInscription" placeholder="Entrez votre nom d'utilisateur" id="name" required>
                    </div>
                    <div class="input-control">
                        <label for="gender">Catégorie du compte</label>
                        <div class="espace"></div>
                        <select id="compte">
                        <option value="1">Compte utilisateur</option>
                        <option value="2">Compte administrateur</option>
                        </select>
                    </div>
                    <div class="input-control">
                        <label for="password2">Mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" placeholder="Entrez votre mot de passe" id="motDePasseIncription1" required>
                    </div>
                    <div class="input-control">
                        <label for="password2">Confirmation mot de passe</label>
                        <div class="espace"></div>
                        <input type="password" placeholder="Confirmez votre mot de passe" id="motDePasseIncription2" required>
                    </div>
                    <div class="input-control">
                        <input type="checkbox" id="engagement" required> <label for="agreement">J'ai lu et j'accepte les termes et conditions</a></label>
                    </div>
                    <div class="input-control">
                        <button type="submit" class="sing-up" id="inscription">S'inscrire</button>
                    </div>
                </form>
                <div class="footer">
                    <div><label for="login"><span class="sign-in">Connexion</span></label></div>
                </div>
            </div>
        </div>

    </body>
</html>