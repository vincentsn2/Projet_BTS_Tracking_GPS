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
                    <label for="tab-1" class="tab-label">Ajouter un compte utilisateur</label>
                        <div class="tab-content">
                        <div class="form-style-5">
                            <form>
                            <fieldset>
                                <legend><span class="number">1</span> Ajouter un compte utilisateur : </legend>

                                <label>Identifiant :</label>
                                <input type="text" name="field1" placeholder="Identifiant de l'utilisateur">

                                <label>Mot de passe :</label>
                                <input type="text" name="field1" placeholder="Mot de passe de l'utilisateur">

                                <label>Confirmation du mot de passe :</label>
                                <input type="email" name="field2" placeholder="Confirmation du mot de passe de l'utilisateur">  
                                
                                <label>Privilège du compte :</label>
                                <select id="job" name="field4">
                                    <optgroup label="Privilège du compte">
                                        <option value="0">Gestionnaire</option>
                                        <option value="1">Administrateur</option>
                                    </optgroup>
                                </select>  
                            </fieldset>
                            <input type="submit" value="Ajouter" />
                            </form>
                            </div>     
                        </div>
                    </div>

                    <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                    <label for="tab-2" class="tab-label">Modifier un compte utilisateur</label>
                    <div class="tab-content">
                        <div class="form-style-5">
                            <form>
                            <fieldset>
                            <legend><span class="number">1</span> Sélectionner un compte utilisateur : </legend>

                            <label>Identifiant du compte utilisateur a modifier :</label>
                            <input type="text" name="field1" placeholder="Identifiant de l'utilisateur a modifier">


                            <legend><span class="number">2</span> Modification de l'identifiant : </legend>

                            <label>Nouveau identifiant :</label>
                            <input type="text" name="field1" placeholder="Nouveau identifiant de l'utilisateur">

                            <legend><span class="number">3</span> Modification du mot de passe : </legend>

                            <label>Nouveau mot de passe :</label>
                            <input type="email" name="field2" placeholder="Nouveau mot de passe de l'utilisateur">  
                            
                            <label>Confirmation du nouveau mot de passe :</label>
                            <input type="email" name="field2" placeholder="Confirmation du nouveau mot de passe de l'utilisateur">  
                            </fieldset>
                            <input type="submit" value="Modifier" />
                            </form>
                            </div>     
                        </div>
                    </div>

                    <div class="tab">
                        <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                        <label for="tab-3" class="tab-label">Supprimer un compte utilisateur</label>
                        <div class="tab-content">
                            <div class="form-style-5">
                                <form>
                                <fieldset>
                                <legend><span class="number">1</span> Sélectionner un compte utilisateur : </legend>

                                <label>Identifiant du compte utilisateur a modifier :</label>
                                <input type="text" name="field1" placeholder="Identifiant de l'utilisateur a supprimer">

                                </fieldset>
                                <input type="submit" value="Supprimer" />
                                </form>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>  

        <?php
            Footer()
        ?>
    </body>
</html>