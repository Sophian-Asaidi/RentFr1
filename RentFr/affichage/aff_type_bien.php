<?php
require_once '../class/reservation.class.php';
require_once '../include/bdd.inc.php';

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
$oReservation = new Reservation($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Réservations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: white;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar a {
            color: white;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
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
            background-color: #343a40;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .table-container {
            overflow-x: auto;
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
 foreach ($typesBiens as $typeBien) : ?>
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

</body>

</html>
