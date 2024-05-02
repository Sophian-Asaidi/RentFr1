<?php
require_once '../class/activite.class.php';
require_once '../include/bdd.inc.php';

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "root");
$oActivite = new Activite($con);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Activités</title>
        <link rel="stylesheet" href="../IndexF/css/cssAd.css">

    </head>

    <body>

        <header>
            <h1>RentFR</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a href="../indexF/indexAdmin.php">Accueil</a>
            <a href="../affichage/aff_bien.php">Nos biens</a>
            <a href="../affichage/aff_reservation.php">Nos réservations</a>
            <a href="../affichage/aff_client.php">Nos clients</a>
        </nav>

        <div class="container">
            <h1>Liste des Activités</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libellé de l'Activité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($oActivite->getAllActivite() as $activite) :
                        ?>
                        <tr>
                            <td><?= $activite['id_activite'] ?></td>
                            <td><?= $activite['lib_activite'] ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="delete_id_activite" value="<?= $activite['id_activite'] ?>">
                                    <button type="submit" name="deleteActivite" class="btn btn-danger">Supprimer</button>
                                </form>
                                <form method="post">
                                    <input type="hidden" name="update_id_activite" value="<?= $activite['id_activite'] ?>">
                                    <button type="submit" name="updateActivite" class="btn btn-primary">Modifier</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Ajouter une Activité</h2>
            <form method="POST" action="../traitement/activite.traitement.php">
                <input type="text" name="lib_activite" placeholder="Libellé de l'Activité" required>
                <button type="submit" name="addActivite" class="btn btn-success">Ajouter</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateActivite'])) {
                $id = $_POST['update_id_activite'];
                $activiteUpdate = $oActivite->getActiviteById($id);
                if ($activiteUpdate) {
                    ?>
                    <h2>Mettre à jour l'Activité</h2>
                    <form method="POST">
                        <input type="hidden" name="update_id_activite" value="<?= $activiteUpdate['id_activite'] ?>">
                        <input type="text" name="lib_activite" placeholder="Libellé de l'Activité" value="<?= $activiteUpdate['lib_activite'] ?>" required>
                        <button type="submit" name="updateActivite" class="btn btn-primary">Mettre à jour</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </body>

</html>
