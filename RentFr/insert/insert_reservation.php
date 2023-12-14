<?php

require_once("../include/bdd.inc.php");
require_once("../class/reservation.class.php");

$nvTitle = $_POST['title'];
$nvDateRese = $_POST['date_rese'];
$nvDadResa = $_POST['dad_resa'];
$nvDafResa = $_POST['daf_resa'];
$nvCommentaire = $_POST['commentaire'];
$nvModeration = $_POST['moderation'];
$nvAnnulation = $_POST['annulation'];
$nvIud = $_POST['iud'];
$nvIdBien = $_POST['id_bien'];
$nvIdClient = $_POST['id_client'];

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
$oNouvelleReservation = new Reservation($con);

$oNouvelleReservation->insertReservation($nvTitle, $nvDateRese, $nvDadResa, $nvDafResa, $nvCommentaire, $nvModeration, $nvAnnulation, $nvIud, $nvIdBien, $nvIdClient);

header("location:../affichage/aff_reservation.php");

?>
