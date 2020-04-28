<?php
    session_start();
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">
        <link rel="stylesheet" href="styleFooter.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <?php
            include 'fonction.php';
        ?>

        <link rel="stylesheet" href="styleParametres.css">
    <head>

    <body>
        <?php
            Menu()
        ?>

        <script>
            var navList = document.getElementById("nav-lists");
            function Show() {
            navList.classList.add("_Menus-show");
            }

            function Hide(){
            navList.classList.remove("_Menus-show");
            }
        </script>

        <div class="wrapper">
                <div class="tabs">
                    <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                    <label for="tab-1" class="tab-label">À propos</label>
                        <div class="tab-content">
                            <div class="form-style-5">
                                <form>
                                    <fieldset>
                                        <legend><span class="number">1</span> Détail du compte : </legend>

                                        <label>Numéro d'identification :</label>
                                        <input type="text" name="field1" placeholder="" readonly>

                                        <label>Identifiant :</label>
                                        <input type="text" name="field1" placeholder="<?php echo "$login";?>" readonly>

                                        <label>Mot de passe :</label>
                                        <input type="email" name="field2" placeholder="****" readonly>  
                                    
                                        <label>Privilège du compte :</label>
                                        <input type="email" name="field2" placeholder="" readonly>  
                                    </fieldset>
                                </form>
                            </div>     
                        </div>
                    </div>

                    <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                    <label for="tab-2" class="tab-label">Modification du compte</label>
                    <div class="tab-content">
                        <div class="form-style-5">
                            <form method="POST" action="parametres.php">
                                <fieldset>
                                    <legend><span class="number">1</span> Modification de l'identifiant : </legend>

                                    <label>Mot de passe actuel :</label>
                                    <input type="text" name="mdpActuel" placeholder="Identifiant de l'utilisateur">

                                    <label>Nouveau identifiant :</label>
                                    <input type="text" name="nouveauLogin" placeholder="Nouveau identifiant de l'utilisateur">

                                    <input type="submit" name="modifierIdentifiant" value="Modifier l'identifiant"/>
                            </form>
                                </fieldset>
                                
                                <fieldset>
                            <form method="POST" action="parametres.php">
                                    <legend><span class="number">2</span> Modification du mot de passe : </legend>

                                    <label>Mot de passe actuel :</label>
                                    <input type="text" name="mdpActuel2" placeholder="Mot de passe de l'utilisateur"> 
                                    
                                    <label>Nouveau mot de passe :</label>
                                    <input type="text" name="nouveauMdp" placeholder="Nouveau mot de passe de l'utilisateur">  
                                
                                    <label>Confirmation du mot de passe :</label>
                                    <input type="text" name="confirmationMdp" placeholder="Confirmation du nouveau mot de passe de l'utilisateur">  
                                
                                <input type="submit" name="modifierMdp" value="Modifier le mot de passe"/>
                                </fieldset>
                            </form>

                            <?php
                                if(isset($_POST['modifierMdp']) && $mdp == $_POST['mdpActuel2'] && $_POST['nouveauMdp'] == $_POST['confirmationMdp'])
                                {
                                    $nouveauMdp = $_POST['nouveauMdp']; 
                                    ModificationMotDePasse($login,$mdp,$nouveauMdp);
                                }
                                else if(isset($_POST['modifierMdp']))
                                {
                                    ?>
                                        <script type="text/javascript" language="javascript">
                                            alert("La modification du mot de passe n'a pas pu etre effectué. Veuillez réessayer");
                                        </script>    
                                    <?php
                                }
                            ?>

                            </div>     
                        </div>
                    </div>

                    <script>
                        function deconnexion()
                        {
                            if (confirm("Vous desirez vraiment vous deconnecter ?"))
                            {
                                window.location="http://127.0.0.1/BABOU/"; 
                                session_destroy();
                            }
                        }
                        
                    </script>

                    <button class="w3-button w3-red" name="deconnexion" onclick="deconnexion()">Déconnexion</button>
                </div>
        </div>

        <?php
            Footer()
        ?>
    </body>
</html>