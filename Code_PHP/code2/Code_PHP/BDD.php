<?php

 class BDD
 {
   
        Private $_db = null;
            
        //Accesseurs ------------
        public function getBase()
        {
            if(!is_null($this->_db))
            {
                return $this->_db;
            }
            
            else
            {
                echo "Base Non accessible";
                return null;
            }
        }
        //constructeur
        Function Connexion($table,$login,$mdp,$ip_bdd,$name_bdd,$user_bdd,$mdp_bdd)
        {
            try
            {
                $this ->_db = new PDO('mysql:host='.$ip_bdd.';dbname='.$name_bdd.';charset=utf8',$user_bdd,$mdp_bdd);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
                
            
        }
    
        Function Autorisation($LoginCompare,$login,$mdp,$table)
        {
            if(!is_null($this->_db))
                        {
                            $request=$this->_db->query("SELECT Logi FROM `".$table."` WHERE Logi='$login' AND MDP='$mdp'");                     					
                            
                            if ($request->rowCount()==1)
                            {
                                return true;
                            }
                            return false;
                        }
                    
        }
        
        Function Inscription($login, $mdp, $typeCompte)
        {
            
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
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
    
        Function AProposIdentification($login,$mdp)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }   
    
            $new = $db->query("SELECT idUser FROM utilisateur WHERE login='$login' AND mdp='$mdp'");
        }
    
        Function AProposPrivilege($login,$mdp)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }   
    
            $new = $db->query("SELECT admin FROM utilisateur WHERE login='$login' AND mdp='$mdp'");
        }
    
        Function ModificationIdentifiant($login,$mdp,$nouveaulogin)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }   
    
            $modif = $db->query("UPDATE utilisateur SET login='$nouveaulogin' WHERE login='$login' AND mdp='$mdp'");
            
    
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Votre identifiant a été modifié avec succès");
                    window.location="http://127.0.0.1/BABOU/";
                    session_destroy();
                </script>
            <?php
        }
    
        Function ModificationMotDePasse($login,$mdp,$nouveauMdp)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }   
    
            $modif = $db->query("UPDATE utilisateur SET mdp='$nouveauMdp' WHERE login='$login' AND mdp='$mdp'");
            
    
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Votre mot de passe a été modifié avec succès");
                    window.location="http://127.0.0.1/BABOU/";
                    session_destroy();
                </script>
            <?php
        }
    
        Function AjouterUtilisateur($login,$mdp,$privilege)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            } 
            
            $modif = $db->query("INSERT INTO utilisateur VALUES ('$login', '$mdp', '$privilege')");   
            
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Le compte utilisateur a été ajouté avec succès");
                </script>
            <?php
        }
    
        Function ModifierIdentifiantUtilisateur($selectLogin,$nouveauLogin)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=trackinggps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            } 
            
            $modif = $db->query("UPDATE utilisateur SET login='$nouveauLogin' WHERE login='$selectLogin'");   
            
            ?>
                <script type="text/javascript" language="javascript">
                    alert("L'identifiant du compte utilisateur a été modifié avec succès");
                </script>
            <?php
        }
    
        Function ModifierMdpUtilisateur($selectLogin,$nouveauMdp)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=gps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            } 
            
            $modif = $db->query("UPDATE utilisateur SET mdp='$nouveauMdp' WHERE login='$selectLogin'");   
            
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Le mot de passe du compte utilisateur a été modifié avec succès");
                </script>
            <?php
        }
    
        Function ModifierPrivilegeUtilisateur($selectLogin,$privilege)
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=gps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            } 
            
            $modif = $db->query("UPDATE utilisateur SET admin='$privilege' WHERE login='$selectLogin'");   
            
            ?>
                <script type="text/javascript" language="javascript">
                    alert("Le privilège du compte utilisateur a été modifié avec succès");
                </script>
            <?php
        }
    
        Function Suppressionutilisateur()
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=gps;charset=utf8','root','');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            } 
    
            $modif = $db ->query("DELETE ");
    
    
    
        }

}
?>