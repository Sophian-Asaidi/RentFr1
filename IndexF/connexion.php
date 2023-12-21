<?php

require_once '../include/bdd.inc.php';
//$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["mail"];
    $password = $_POST["mdp"];

    try {
        $sql = "SELECT * FROM admin WHERE user = :user AND password = :password";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: IndexAdmin.php");
            exit();
        } else {
            echo "Identifiants incorrects";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
