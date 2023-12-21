<?php

require_once '../include/bdd.inc.php';

// Connexion à la base de données
$con = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);

// Vérification de la requête AJAX
if (isset($_POST['keyword'], $_POST['type'])) {
    $keyword = $_POST['keyword'];
    $type = $_POST['type'];

    // Choisissez la table appropriée en fonction du type
    $column = ($type === 'categorie') ? 'lib_type_bien' : 'ville';
    $table = ($type === 'categorie') ? 'type_bien' : 'communes';

    // Requête SQL pour récupérer les suggestions
    $query = $con->prepare("SELECT $column FROM $table WHERE $column LIKE :keyword");
    $query->execute(['keyword' => '%' . $keyword . '%']);

    // Récupération des résultats
    $result = $query->fetchAll(PDO::FETCH_COLUMN);

    // Affichage des suggestions
    if ($result) {
        foreach ($result as $row) {
            echo '<li>' . htmlspecialchars($row) . '</li>';
        }
    } else {
        echo '<li>Aucune suggestion trouvée</li>';
    }
}
?>
