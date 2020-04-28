<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleMenu.css">
        <link rel="stylesheet" href="styleFooter.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <?php
            include 'fonction.php';
        ?>

        <link rel="stylesheet" href="styleHistorique.css">
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
                        <label for="tab-1" class="tab-label">Filtrage de l'historique</label>
                            <div class="tab-content">
                            <div class="form-style-5">
                                <form>
                                <fieldset>
                                    <legend><span class="number">1</span> Filtrage de l'historique par l'identifiant du bateau : </legend>

                                    <label>Identifiant du bateau :</label>
                                    <input type="text" name="field1" placeholder="Identifiant du bateau">
                                </fieldset>
                                <input type="submit" value="Filtrer avec l'identifiant" />
                                </form>
                                <div class="separation"><hr></div>
                                <form>
                                <fieldset>
                                    <legend><span class="number">2</span> Filtrage de l'historique par la date : </legend>

                                    <label>Date de réception (jj/mm/aaaa) :</label>
                                    <input type="text" name="field1" placeholder="Date de réception">
                                </fieldset>
                                <input type="submit" value="Filtrer avec la date" />
                                </form>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>      

            <div class='tableau'>
                <table class="table-fill">
                    <thead>
                        <tr>
                            <th class="text-center">Identifiant</th>
                            <th class="text-center">Positionnement GPS</th>
                            <th class="text-center">Profondeur</th>
                            <th class="text-center">Vitesse</th>
                            <th class="text-center">Niveau de batterie</th>
                            <th class="text-center">Date de réception</th>
                        </tr>
                    </thead>
                    <tbody class="table-hover">
                        <tr>
                            <td class="text-left">1</td>
                            <td class="text-left">trame GPS</td>
                            <td class="text-left">6 m</td>
                            <td class="text-left">5 noeuds</td>
                            <td class="text-left">62 %</td>
                            <td class="text-left">16/03/2020</td>
                        </tr>
                        <tr>
                            <td class="text-left">2</td>
                            <td class="text-left">trame GPS</td>
                            <td class="text-left">6 m</td>
                            <td class="text-left">5 noeuds</td>
                            <td class="text-left">62 %</td>
                            <td class="text-left">16/03/2020</td>
                        </tr>
                        <tr>
                            <td class="text-left">3</td>
                            <td class="text-left">trame GPS</td>
                            <td class="text-left">6 m</td>
                            <td class="text-left">5 noeuds</td>
                            <td class="text-left">62 %</td>
                            <td class="text-left">16/03/2020</td>
                        </tr>
                        <tr>
                            <td class="text-left">4</td>
                            <td class="text-left">trame GPS</td>
                            <td class="text-left">6 m</td>
                            <td class="text-left">5 noeuds</td>
                            <td class="text-left">62 %</td>
                            <td class="text-left">16/03/2020</td>
                        </tr>
                        <tr>
                            <td class="text-left">5</td>
                            <td class="text-left">trame GPS</td>
                            <td class="text-left">6 m</td>
                            <td class="text-left">5 noeuds</td>
                            <td class="text-left">62 %</td>
                            <td class="text-left">16/03/2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        
        
        <?php
            Footer()
        ?>
    </body>
</html>