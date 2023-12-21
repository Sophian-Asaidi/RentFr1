<?php

require_once("../include/bdd.inc.php");
require_once("../class/client.class.php");

$nvNomClient = $_POST['nom_client'];
$nvPrenomClient = $_POST['prenom_client'];
$nvCopClient = $_POST['cop_client'];
$nvVilleClient = $_POST['vil_client'];
$nvMailClient = $_POST['mail_client'];
$nvPassClient =$_POST['pass_client'];
$nvStatutClient = 1;
$nvValidClient = 'validé';

$oNouveauClient = new Client($con);

$oNouveauClient->insertClient($nvNomClient,$nvPrenomClient,$nvCopClient,$nvVilleClient,$nvMailClient,$nvPassClient,$nvStatutClient,$nvValidClient);

/*header("location:../affichage/aff_client.php");*/
header("location:../IndexF/index.html");

?>
