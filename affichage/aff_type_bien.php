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
            <h1>RentFR</h1>
        </header>

        <nav class="navbar navbar-dark bg-dark">
            <a href="../indexF/indexAdmin.php">Accueil</a>
            <a href="../affichage/aff_bien.php">Nos biens</a>
            <a href="../affichage/aff_reservation.php">Nos réservations</a>
            <a href="../affichage/aff_client.php">Nos clients</a>
        </nav>

        <div class="container">
            <h1>Liste des Types de Biens</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libellé du Type de Bien</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../traitement/type_bien.traitement.php';
                    foreach ($typesBiens as $typeBien) :
                        ?>
                        <tr>
                            <td><?= $typeBien['id_type_bien'] ?></td>
                            <td><?= $typeBien['lib_type_bien'] ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="delete_id_type_bien" value="<?= $typeBien['id_type_bien'] ?>">
                                    <button type="submit" name="deleteTypeBien" class="btn btn-danger">Supprimer</button>
                                </form>
                                <form method="post">
                                    <input type="hidden" name="update_id_type_bien" value="<?= $typeBien['id_type_bien'] ?>">
                                    <button type="submit" name="updateTypeBien" class="btn btn-primary">Modifier</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Ajouter un Type de Bien</h2>
            <form method="post">
                <input type="text" name="lib_type_bien" placeholder="Libellé du Type de Bien" required>
                <button type="submit" name="addTypeBien" class="btn btn-success">Ajouter</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateTypeBien'])) {
                $id = $_POST['update_id_type_bien'];
                $typeBienUpdate = TypeBien::getTypeBienById($id);
                if ($typeBienUpdate) {
                    ?>
                    <h2>Mettre à jour le Type de Bien</h2>
                    <form method="post">
                        <input type="hidden" name="update_id_type_bien" value="<?= $typeBienUpdate['id_type_bien'] ?>">
                        <input type="text" name="lib_type_bien" placeholder="Libellé du Type de Bien" value="<?= $typeBienUpdate['lib_type_bien'] ?>" required>
                        <button type="submit" name="updateTypeBien" class="btn btn-primary">Mettre à jour</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </body>

</html>
