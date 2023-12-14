<?php
require_once '../class/bien.class.php';
require_once '../include/bdd.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Biens</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../autocomplete/autocomplete.js"></script>
        <script  src="../autocomplete/jquery.min.js"></script>
        <script src="../autocomplete/script.js"></script>


        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }


            header {
                background-color: #333;
                padding: 10px;
                text-align: center;
            }

            nav {
                background-color: #444;
                overflow: hidden;
            }

            nav a {
                float: left;
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            nav a:hover {
                background-color: #ddd;
                color: black;
            }

            .container {
                padding: 20px;
            }

            h1 {
                color: #333;
            }

            form {
                margin-top: 20px;
            }

            .formulaire-label {
                display: block;
                margin-top: 10px;
            }

            .formulaire-input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            .btn {
                padding: 10px;
                background-color: #333;
                color: white;
                border: none;
                cursor: pointer;
            }

            .btn-primary {
                background-color: #007bff;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .table th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>Gestion des Biens</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a href="../indexF/indexAd.php">Accueil</a>
            <a href="../affichage/aff_client.php">Nos clients</a>
            <a href="../affichage/aff_reservation.php">Nos res</a>
            <a href="../affichage/aff_type_bien.php">Type bien</a>
        </nav>

        <div class="container">
            <h1>Liste des Biens</h1>
            <form action="../traitement/bien.traitement.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Biens</th>
                            <th>Nom Bien</th>
                            <th>Rue Bien</th>
                            <th>Code Postal Bien</th>
                            <th>Ville Bien</th>
                            <th>Surface Bien</th>
                            <th>Nombre de Couchages</th>
                            <th>Nombre de Pièces</th>
                            <th>Nombre de Chambres</th>
                            <th>Descriptif</th>
                            <th>Référence Bien</th>
                            <th>Statut Bien</th>
                            <th>ID Type Bien</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
                        $oBien = new Bien($con);
                        $biens = $oBien->selectBien();

                        foreach ($biens as $bien) {
                            echo "<tr>";
                            echo "<td>", $bien['id_bien'], "</td>";
                            echo "<td><input type='text' name='nom_bien[", $bien['id_bien'], "]' value='", $bien['nom_bien'], "'></td>";
                            echo "<td><input type='text' name='rue_bien[", $bien['id_bien'], "]' value='", $bien['rue_bien'], "'></td>";
                            echo "<td><input type='text' name='cop_bien[", $bien['id_bien'], "]' value='", $bien['cop_bien'], "'></td>";
                            echo "<td><input type='text' name='vil_bien[", $bien['id_bien'], "]' value='", $bien['vil_bien'], "'></td>";
                            echo "<td><input type='text' name='sup_bien[", $bien['id_bien'], "]' value='", $bien['sup_bien'], "'></td>";
                            echo "<td><input type='text' name='nb_couchage[", $bien['id_bien'], "]' value='", $bien['nb_couchage'], "'></td>";
                            echo "<td><input type='text' name='nb_piece[", $bien['id_bien'], "]' value='", $bien['nb_piece'], "'></td>";
                            echo "<td><input type='text' name='nb_chambre[", $bien['id_bien'], "]' value='", $bien['nb_chambre'], "'></td>";
                            echo "<td><input type='text' name='descriptif[", $bien['id_bien'], "]' value='", $bien['descriptif'], "'></td>";
                            echo "<td><input type='text' name='ref_bien[", $bien['id_bien'], "]' value='", $bien['ref_bien'], "'></td>";
                            echo "<td><input type='text' name='statu_bien[", $bien['id_bien'], "]' value='", $bien['statu_bien'], "'></td>";
                            echo "<td><input type='text' name='lib_type_bien[", $bien['id_bien'], "]' class='lib_type_bien_input' value='", $oBien->getTypeLabelById($bien['id_type_bien']), "'></td>";

                            echo "<td><button class='btn btn-primary' name='updateBien' value='", $bien['id_bien'], "' type='submit'>Modifier</button>
                                      <button class='btn btn-danger' name='deleteBien' value='", $bien['id_bien'], "' type='submit'>Supprimer</button>" . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </form>

            <h2>Ajouter un Bien</h2>
            <form action="../insert/insert_bien.php" method="post" class="formulaire-insertion">
                <label for="nom_bien" class="formulaire-label">Nom Bien : </label>
                <input type="text" name="nom_bien" id="nom_bien" class="formulaire-input">

                <label for="rue_bien" class="formulaire-label">Rue Bien : </label>
                <input type="text" name="rue_bien" id="rue_bien" class="formulaire-input">

                <label for="cop_bien" class="formulaire-label">Code Postal : </label>
                <input type="text" name="cop_bien" id="cop_bien" class="formulaire-input" onkeyup="autocomplet()">

                <label for="vil_bien" class="formulaire-label">Ville Bien : </label>
                <input type="text" name="vil_bien" id="vil_bien" class="formulaire-input">

                <label for="sup_bien" class="formulaire-label">Surface Bien : </label>
                <input type="text" name="sup_bien" id="sup_bien" class="formulaire-input">

                <label for="nb_couchage" class="formulaire-label">Nombre de Couchages : </label>
                <input type="text" name="nb_couchage" id="nb_couchage" class="formulaire-input">

                <label for="nb_piece" class="formulaire-label">Nombre de Pièces : </label>
                <input type="text" name="nb_piece" id="nb_piece" class="formulaire-input">

                <label for="nb_chambre" class="formulaire-label">Nombre de Chambres : </label>
                <input type="text" name="nb_chambre" id="nb_chambre" class="formulaire-input">

                <label for="descriptif" class="formulaire-label">Descriptif : </label>
                <input type="text" name="descriptif" id="descriptif" class="formulaire-input">

                <label for="ref_bien" class="formulaire-label">Référence Bien : </label>
                <input type="text" name="ref_bien" id="ref_bien" class="formulaire-input">

                <label for="statu_bien" class="formulaire-label">Statut Bien : </label>
                <input type="text" name="statu_bien" id="statu_bien" class="formulaire-input">

                <label for="id_type_bien" class="formulaire-label">ID Type Bien : </label>
                <input type="text" name="lib_type_bien" id="lib_type_bien" class="formulaire-input">



                <button type="submit" name="addBien" class="btn btn-success">Ajouter</button>
            </form>

        </div>
    </body>

</html>
