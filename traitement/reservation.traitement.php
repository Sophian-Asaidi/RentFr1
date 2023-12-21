<?php
require_once '../class/reservation.class.php';
require_once '../include/bdd.inc.php';

$oReservation = new Reservation($con);

if (isset($_POST['updateReservation'])) {
    $id_reservation = $_POST['updateReservation'];
    $title = $_POST['title'][$id_reservation];
    $date_rese = $_POST['date_rese'][$id_reservation];
    $dad_resa = $_POST['dad_resa'][$id_reservation];
    $daf_resa = $_POST['daf_resa'][$id_reservation];
    $commentaire = $_POST['commentaire'][$id_reservation];
    $moderation = $_POST['moderation'][$id_reservation];
    $annulation = $_POST['annulation'][$id_reservation];
    $iud = $_POST['iud'][$id_reservation];
    $id_bien = $_POST['id_bien'][$id_reservation];
    $id_client = $_POST['id_client'][$id_reservation];

    $oReservation->updateReservation($id_reservation, $title, $date_rese, $dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $iud, $id_bien, $id_client);
} elseif (isset($_POST['deleteReservation'])) {
    $id_reservation = $_POST['deleteReservation'];
    $oReservation->deleteReservation($id_reservation);
}

header("location:../affichage/aff_reservation.php");
?>
