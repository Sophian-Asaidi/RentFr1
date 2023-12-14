<?php
require_once '../class/client.class.php';
require_once '../include/bdd.inc.php';

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
$oClient = new Client($con);

if (isset($_POST['updateClient'])) {
    $id_client = $_POST['updateClient'];
    $nom_client = $_POST['nom_client'][$id_client];
    $prenom_client = $_POST['prenom_client'][$id_client];
    $cop_client = $_POST['cop_client'][$id_client];
    $vil_client = $_POST['vil_client'][$id_client];
    $mail_client = $_POST['mail_client'][$id_client];
    $pass_client = $_POST['pass_client'][$id_client];
    $statut_client = $_POST['statut_client'][$id_client];
    $valid_client = $_POST['valid_client'][$id_client];

    $oClient->updateClient($id_client, $nom_client, $prenom_client, $cop_client, $vil_client, $mail_client, $pass_client, $statut_client, $valid_client);
} elseif (isset($_POST['deleteClient'])) {
    $id = $_POST['deleteClient'];
    $oClient->deleteClient($id);
}

header("location:../affichage/aff_client.php");
?>
