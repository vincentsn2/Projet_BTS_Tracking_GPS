<?php
    function Menu()
    {
?>
        <div class="container">
            <div class="logo">
                <a href="accueil.php"><img src="babou.png" alt="logo"></a>
            </div>
            <div class="navbar">

                <div class="icon-bar" onclick="Show()">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>

                <ul id="nav-lists">
                    <li class="close"><span onclick="Hide()">×</span></li>
                    <li><a class="trackingGPS" href="GPS.php"><div class="icon-navbar"><img src="search.png" alt="icon-navbar" height=96%></div>Positionnement GPS</a></li>
                    <li><a class="trackingGPS" href="anomalies.php"><div class="icon-navbar"><img src="attention.png" alt="icon-navbar" height=100%></div>Anomalies</a></li>
                    <li><a class="trackingGPS" href="historique.php"><div class="icon-navbar"><img src="bdd.png" alt="icon-navbar" height=96%></div>Historique</a></li>
                    <li><a class="backOffice" href="administrateur.php"><div class="icon-navbar"><img src="user.png" alt="icon-navbar" height=96%></div>Administrateur</a></li>
                    <li><a class="parametres" href="parametres.php"><div class="icon-navbar"><img src="setting.png" alt="icon-navbar" height=96%></div>Paramètres</a></li>
                </ul>

            </div>
        </div>
<?php
    }


    function Footer()
    {
?>
        <footer class="footer-distributed">
            <div class="footer-left">
                <a href="accueil.php"><h3>Babou<span> Marine</span></h3></a>

                <p class="footer-links">
                    <a href="GPS.php">Positionnement GPS</a>
                    |
                    <a href="anomalies.php">Anomalies</a>
                    |
                    <a href="historique.php">Historique</a>
                    |
                    <a href="administrateur.php">Administrateur</a>
                    |
                    <a href="parametres.php">Paramètres</a>
                </p>

                <p class="footer-company-name">© 2020 - Babou Marine</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Babou Marine,
                        Chemin de Saint-Mary</span>
                        46000 - Cahors</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p class="pasGras">Fixe : </p> <p> 05 65 30 08 99 /</p> <p class="pasGras"> Mobile : </p> <p> 06 43 42 39 69</p>
                </div>
                <div>
                    <i class="fa fa-home"></i>
                    <p class="pasGras">Du Lundi au Samedi :</p> <p>09:00 - 12:30</p> <p class="pasGras">/</p> <p> 14:00 - 19:00</p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>À propos de Babou Marine :</span>
                    Babou Marine est implanté à Cahors depuis 1928 c’est une société spécialisée depuis 25 ans dans les croisières fluviales en France.</p>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/pages/category/Boat-Dealership/Babou-Marine-149596035729015/"><i class="fa fa-facebook" style="font-size:30px"></i></a>
                </div>
            </div>
        </footer>
<?php
    }

    Function Connexion($login,$mdp)
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=stationmeteo;charset=utf8','root','');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
            
        if (isset($login) AND isset($mdp))
        {
    
            $verif = $db->prepare('SELECT COUNT(*) FROM utilisateur WHERE mdp = :password AND login = :pseudo'); // Je compte le nombre d'entrée ayant pour mot de passe et login ceux rentrés
            $verif->bindValue(':password', $mdp, PDO::PARAM_STR);
            $verif->bindValue(':pseudo', $login, PDO::PARAM_STR);
            $verif->execute();
            $donnees = $verif->fetchColumn();
            $verif->closeCursor();
                
            if($donnees == 1) // On a trouvé un membre avec ce couple mdp, login 
            { 
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['mdp'] = $mdp;
                header('Location:accueil.php');        
            }
            else 
            { // Personne n'existe dans la table avec ce couple mdp, login
                echo "<script type='text/javascript'>";
                echo "alert('Login ou mot de passe invalide, veuillez ressayer.')";  
                echo "</script>";  
            }
        }
    }

    Function Inscription($login, $mdp, $typeCompte)
    {
        
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=stationmeteo;charset=utf8','root','');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }   

        if(isset($login) AND isset($mdp) AND isset($typeCompte))
        {
            $new = $db->query("INSERT INTO utilisateur (login, mdp, admin) VALUES ('$login','$mdp','$typeCompte')");
            header('Location:index.php');
        }
    }
?>