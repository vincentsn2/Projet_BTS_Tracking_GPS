<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">
        <link rel="stylesheet" href="styleFooter.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <?php
            include 'fonction.php';
        ?>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

        <style>
            .carte 
            {
                padding-right: 20%;
                padding-left: 20%;
                padding-top: 2%;
            }
        </style>
    
    <head>

    <body onload="Carte()">
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

        <div class="carte"><div id="map" style="width:100%; height:100%"></div></div>

        </div>
        
        <script type="text/javascript">
            function Carte() {
                var map = L.map('map').setView([48.833, 2.333], 7); // LIGNE 14

                var osmLayer = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { // LIGNE 16
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            });
    
            map.addLayer(osmLayer);
        }
        </script>

        <?php
            Footer()
        ?>
    </body>
</html>