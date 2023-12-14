<?php
require_once '../class/client.class.php';
require_once '../include/bdd.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Real Estate Website</title>
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
            <h1>RentFR</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a href="../indexF/indexAd.php">Accueil</a>
            <a href="../affichage/aff_bien.php">Nos biens</a>
            <a href="../affichage/aff_reservation.php">Nos res</a>
            <a href="../affichage/aff_type_bien.php">Type bien</a>
        </nav>


        <div class="container">
            <h1>Liste des Clients</h1>
            <form action="../traitement/client.traitement.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Clients</th>
                            <th>Nom client</th>
                            <th>Prénom client</th>
                            <th>Code Postal client</th>
                            <th>Ville client</th>
                            <th>Email client</th>
                            <th>Mot de passe client</th>
                            <th>Statut client</th>
                            <th>Validation client</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tableau_corps">
                        <?php
                        $con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
                        $oClient = new Client($con);
                        $result = $oClient->selectClient();

                        if ($result->rowCount() > 0) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                                echo "<tr>";
                                echo "<td>", $row['id_client'], "</td>";
                                echo "<td><input type='text' name='nom_client[", $row['id_client'], "]' value='", $row['nom_client'], "'></td>";
                                echo "<td><input type='text' name='prenom_client[", $row['id_client'], "]' value='", $row['prenom_client'], "'></td>";
                                echo "<td><input type='text' name='cop_client[", $row['id_client'], "]' value='", $row['cop_client'], "'></td>";
                                echo "<td><input type='text' name='vil_client[", $row['id_client'], "]' value='", $row['vil_client'], "'></td>";
                                echo "<td><input type='text' name='mail_client[", $row['id_client'], "]' value='", $row['mail_client'], "'></td>";
                                echo "<td><input type='password' name='pass_client[", $row['id_client'], "]' value='", $row['pass_client'], "'></td>";
                                echo "<td><input type='text' name='statut_client[", $row['id_client'], "]' value='", $row['statut_client'], "'></td>";
                                echo "<td><input type='text' name='valid_client[", $row['id_client'], "]' value='", $row['valid_client'], "'></td>";
                                echo "<td><button class='btn btn-primary' name='updateClient' value='", $row['id_client'], "' type='submit'>Modifier</button>
                            <button class='btn btn-danger' name='deleteClient' value='", $row['id_client'], "' type='submit'>Supprimer</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucun résultat trouvé.</p>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <h2>Ajouter un Client</h2>
            <form action="../insert/insert_client_Ad.php" method="post" class="formulaire-insertion">
                <label for="nom_client" class="formulaire-label">Nom Client : </label>
                <input type="text" name="nom_client" id="nom_client" class="formulaire-input">

                <label for="prenom_client" class="formulaire-label">Prenom Client : </label>
                <input type="text" name="prenom_client" id="prenom_client" class="formulaire-input">


                <label for="cop_client" class="formulaire-label">Code postal : </label>
                <input type="text" name="cop_client" id="cop_client" class="formulaire-input">

                <label for="vil_client" class="formulaire-label">Ville client : </label>
                <input type="text" name="vil_client" id="vil_client" class="formulaire-input">

                <label for="mail_client" class="formulaire-label">Mail client : </label>
                <input type="text" name="mail_client" id="mail_client" class="formulaire-input">

                <label for="pass_client" class="formulaire-label">Mdp Client : </label>
                <input type="password" name="pass_client" id="pass_client" class="formulaire-input">

                <label for="statut_client" class="formulaire-label">Statut du client : </label>
                <input type="text" name="statut_client" id="statut_client" class="formulaire-input">

                <label for="valid_client" class="formulaire-label">Client valide ? </label>
                <input type="text" name="valid_client" id="valid_client" class="formulaire-input">
                <input type="submit" name="oNouveauClient" value="Ajouter un Client" class="btn btn-primary">
            </form>
        </div>
    </body>

</html>

