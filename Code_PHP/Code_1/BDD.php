<?php

 class BDD
 {
  
    //proprietés
  
     Private $host = 'localhost';
     Private $nombdd = 'trackinggps';
     Private $pseudobdd = 'root';
     Private $mdpbdd ='';
  



    //méthodes (exmple: function ConnexionBDD())
    
     public Function ConnexionBDD($login,$mdp)
    {
     try{
         $bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->nombdd, $this->pseudobdd, $this->mdpbdd);
        }
        catch(PDOException $e){
            die('<h1>Erreur!</h1>');
        }
        
       $verif = $bdd -> prepare('SELECT COUNT(*) FROM utilisateur WHERE mdp = :password AND login = :pseudo');
       $verif -> bindvalue(':password', $mdp, PDO::PARAM_STR);
       $verif -> bindvalue(':pseudo', $login, PDO::PARAM_STR);
       $verif -> execute();
       $donnees = $verif->fetchColumn();
       $verif->closeCursor();
       
       if($donnees == 1)
       {//le membre existe dans la BDD
         session_start();
         $_SESSION['login'] = $login;
         $_SESSION['mdp'] = $mdp;
         header('Location:accueil.php');
       }
       else
       {//le user n'existe pas dans la bdd
        echo "<script type='text/javascript'>";
        echo "alert('Login ou mot de passe invalide, veuillez ressayer.')";  
        echo "</script>"; 
       }
    }

    public Function InscriptionBDD($login, $mdp, $typeCompte)
    {
        try{
            $bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->nombdd, $this->pseudobdd, $this->mdpbdd);
           }
           catch(PDOException $e){
               die('<h1>Erreur!</h1>');
           } 
        
        if(isset($login) AND isset($mdp) AND isset($typeCompte))
        {
            $new = $bdd -> prepare("INSERT INTO utilisateur (login, mdp, privilege) VALUES ('$login','$mdp','$typeCompte')");
            $new -> bindvalue(':password', $mdp, PDO::PARAM_STR);
            $new -> bindvalue(':pseudo', $login, PDO::PARAM_STR);
            $new -> bindvalue(':typecompte', $typecompte, PDO::PARAM_STR);
            $new ->execute();
            
            header('Location:index.php');
        } 

    }


    public Function Supression()
    {
        try{
            $bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->nombdd, $this->pseudobdd, $this->mdpbdd);
           }
           catch(PDOException $e){
               die('<h1>Erreur!</h1>');
           } 


           if(isset($login))
           {

            
           }

    }
 
    public Function ModificationBDD()
    {


    }


}

?>