<?php
require_once '../class/reservation.class.php';
require_once '../include/bdd.inc.php';

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "root");
$oReservation = new Reservation($con);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Réservations</title>
        <link rel="stylesheet" href="../IndexF/css/cssAd.css">
        
    </head>

    <body>
        <header>
            <h1>Gestion des Réservations</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a href="../indexF/indexAdmin.php">Accueil</a>
            <a href="../affichage/aff_client.php">Nos clients</a>
            <a href="../affichage/aff_bien.php">Nos biens</a>
            <a href="../affichage/aff_type_bien.php">Type bien</a>
        </nav>

        <form action="../traitement/reservation.traitement.php" method="post" class="container">
            <h2>Liste des Réservations</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Réservation</th>
                        <th>Title</th>
                        <th>Date Réservation</th>
                        <th>Date Début Réservation</th>
                        <th>Date Fin Réservation</th>
                        <th>Commentaire</th>
                        <th>Moderation</th>
                        <th>Annulation</th>
                        <th>IUD</th>
                        <th>ID Bien</th>
                        <th>ID Client</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tableau_corps">
                    <?php
                    $result = $oReservation->selectReservation();

                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>", $row['id_reservation'], "</td>";
                            echo "<td><input type='text' name='title[", $row['id_reservation'], "]' value='", $row['title'], "'></td>";
                            echo "<td><input type='date' name='date_rese[", $row['id_reservation'], "]' value='", $row['date_rese'], "'></td>";
                            echo "<td><input type='date' name='dad_resa[", $row['id_reservation'], "]' value='", $row['dad_resa'], "'></td>";
                            echo "<td><input type='date' name='daf_resa[", $row['id_reservation'], "]' value='", $row['daf_resa'], "'></td>";
                            echo "<td><input type='text' name='commentaire[", $row['id_reservation'], "]' value='", $row['commentaire'], "'></td>";
                            echo "<td><input type='text' name='moderation[", $row['id_reservation'], "]' value='", $row['moderation'], "'></td>";
                            echo "<td><input type='text' name='annulation[", $row['id_reservation'], "]' value='", $row['annulation'], "'></td>";
                            echo "<td><input type='text' name='iud[", $row['id_reservation'], "]' value='", $row['iud'], "'></td>";
                            echo "<td><input type='text' name='id_bien[", $row['id_reservation'], "]' value='", $row['id_bien'], "'></td>";
                            echo "<td><input type='text' name='id_client[", $row['id_reservation'], "]' value='", $row['id_client'], "'></td>";
                            echo "<td>
                            <button class='btn btn-primary' name='updateReservation' value='", $row['id_reservation'], "' type='submit'>Modifier</button> <button class='btn btn-danger' name='deleteReservation' value='", $row['id_reservation'], "' type='submit'>Supprimer</button>
                          </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Aucun résultat trouvé.</p>";               
                    }
                    ?>
                </tbody>
            </table>
        </form>

        <form action="../insert/insert_reservation.php" method="post" class="container formulaire-insertion">
            <h2>Ajouter une Réservation</h2>
            <!-- Ajoutez les champs du formulaire d'ajout ici -->
            <label for="title" class="formulaire-label">Title : </label>
            <input type="text" name="title" id="title" class="formulaire-input">

            <label for="date_rese" class="formulaire-label">Date Réservation : </label>
            <input type="date" name="date_rese" id="date_rese" class="formulaire-input">

            <label for="dad_resa" class="formulaire-label">Date Début Réservation : </label>
            <input type="date" name="dad_resa" id="dad_resa" class="formulaire-input">

            <label for="daf_resa" class="formulaire-label">Date Fin Réservation : </label>
            <input type="date" name="daf_resa" id="daf_resa" class="formulaire-input">

            <label for="commentaire" class="formulaire-label">Commentaire : </label>
            <input type="text" name="commentaire" id="commentaire" class="formulaire-input">

            <label for="moderation" class="formulaire-label">Modération : </label>
            <input type="text" name="moderation" id="moderation" class="formulaire-input">

            <label for="annulation" class="formulaire-label">Annulation : </label>
            <input type="text" name="annulation" id="annulation" class="formulaire-input">

            <label for="iud" class="formulaire-label">IUD : </label>
            <input type="text" name="iud" id="iud" class="formulaire-input">

            <label for="id_bien" class="formulaire-label">ID Bien : </label>
            <input type="text" name="id_bien" id="id_bien" class="formulaire-input">

            <label for="id_client" class="formulaire-label">ID Client : </label>
            <input type="text" name="id_client" id="id_client" class="formulaire-input">

            <input type="submit" name="oNouvelleReservation" value="Ajouter une Réservation" class="btn btn-primary">
        </form>
    </body>

</html>
