<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">
        <link rel="stylesheet" href="styleFooter.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <?php
            include 'fonction.php';
        ?>

        <style>
            .imageAccueil img {
            max-width: 100%;
            height: auto;
            
            padding-top:2%;
            }
            
            h1 { color: #ffffff; font-family: 'Raleway',sans-serif; font-size: 50px; font-weight: 800; line-height: 70px; margin: 20 0 0px; text-align: center; text-transform: uppercase; }
        </style>
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

        <h1>BIENVENUE SUR VOTRE TABLEAU DE BORD</h1>

        <div class="imageAccueil">
            <center><img src="index.jpg" alt="Image d'accueil" width="1000" height="300"></center>
        </div>
        
        <?php
            Footer()
        ?>
    </body>
</html>