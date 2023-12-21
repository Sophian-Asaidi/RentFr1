<?php
require_once '../include/bdd.inc.php';
$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");                   
$keyword = '%' . $_POST['keyword'] . '%';

$sql = "SELECT * FROM commune_2022 WHERE ville LIKE (:var) OR cp LIKE (:var) ORDER BY ville ASC LIMIT 0, 10";
$req = $con->prepare($sql);
$req->bindParam(':var', $keyword, PDO::PARAM_STR);
$req->execute();
$list = $req->fetchAll();
foreach ($list as $res) {
    //  affichage
    $Listeeleve = str_replace($_POST['keyword'], '<b>' . $_POST['keyword'] . '</b>', $res['ville'] . ' ' . $res['cp']);
    // sélection 
    echo '<li onclick="set_item(\'' . str_replace("'", "\'", $res['ville'] . ' ' . $res['cp']) . '\')">' . $Listeeleve . '</li>';
}
?>
