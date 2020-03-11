<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">
        <link rel="stylesheet" href="styleFooter.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <head>

    <body>
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
                <li><a class="trackingGPS" href="#"><div class="icon-navbar"><img src="search.png" alt="icon-navbar" height=96%></div>Tracking GPS</a></li>
                <li><a class="backOffice" href="#"><div class="icon-navbar"><img src="user.png" alt="icon-navbar" height=96%></div>Back Office</a></li>
                <li><a class="parametres" href="#"><div class="icon-navbar"><img src="setting.png" alt="icon-navbar" height=96%></div>Paramètres</a></li>
            </ul>

            </div>
        </div>
        <script>
            var navList = document.getElementById("nav-lists");
            function Show() {
            navList.classList.add("_Menus-show");
            }

            function Hide(){
            navList.classList.remove("_Menus-show");
            }
        </script>

        <footer class="footer-distributed">
            <div class="footer-left">
                <a href="accueil.php"><h3>Babou<span> Marine</span></h3></a>

                <p class="footer-links">
                    <a href="#">Tracking GPS</a>
                    |
                    <a href="#">Back Office</a>
                    |
                    <a href="parametres.php">Paramètres</a>
                    |
                    <a href="#">?</a>
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
    </body>
</html>