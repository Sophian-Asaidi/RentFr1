<?php

require_once '../include/bdd.inc.php';

class Reservation {

    private $con;
    private $id_reservation;
    private $title;
    private $date_rese;
    private $dad_resa;
    private $daf_resa;
    private $commentaire;
    private $moderation;
    private $annulation;
    private $iud;
    private $id_bien;
    private $id_client;

    // Constructeur
    public function __construct($c) {
        $this->con = $c;
    }

    // Getters
    public function getIdReservation() {
        return $this->id_reservation;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDateRese() {
        return $this->date_rese;
    }

    public function getDadResa() {
        return $this->dad_resa;
    }

    public function getDafResa() {
        return $this->daf_resa;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getModeration() {
        return $this->moderation;
    }

    public function getAnnulation() {
        return $this->annulation;
    }

    public function getIud() {
        return $this->iud;
    }

    public function getIdBien() {
        return $this->id_bien;
    }

    public function getIdClient() {
        return $this->id_client;
    }

    // Setters
    public function setTitle($t) {
        $this->title = $t;
    }

    public function setDateRese($d) {
        $this->date_rese = $d;
    }

    public function setDadResa($d) {
        $this->dad_resa = $d;
    }

    public function setDafResa($d) {
        $this->daf_resa = $d;
    }

    public function setCommentaire($c) {
        $this->commentaire = $c;
    }

    public function setModeration($m) {
        $this->moderation = $m;
    }

    public function setAnnulation($a) {
        $this->annulation = $a;
    }

    public function setIud($i) {
        $this->iud = $i;
    }

    public function setIdBien($id) {
        $this->id_bien = $id;
    }

    public function setIdClient($id) {
        $this->id_client = $id;
    }

    // Fonctions
    public function selectReservation() {
        $sql = "SELECT * FROM reservation";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertReservation($title, $date_rese, $dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $iud, $id_bien, $id_client) {
        $data = [
            ":title" => $title,
            ":date_rese" => $date_rese,
            ":dad_resa" => $dad_resa,
            ":daf_resa" => $daf_resa,
            ":commentaire" => $commentaire,
            ":moderation" => $moderation,
            ":annulation" => $annulation,
            ":iud" => $iud,
            ":id_bien" => $id_bien,
            ":id_client" => $id_client
        ];

        $sql = "INSERT INTO reservation (title, date_rese, dad_resa, daf_resa, commentaire, moderation, annulation, iud, id_bien, id_client)
        VALUES (:title, :date_rese, :dad_resa, :daf_resa, :commentaire, :moderation, :annulation, :iud, :id_bien, :id_client)";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateReservation($id_reservation, $title, $date_rese, $dad_resa, $daf_resa, $commentaire, $moderation, $annulation, $iud, $id_bien, $id_client) {
        $data = [
            ":id_reservation" => $id_reservation,
            ":title" => $title,
            ":date_rese" => $date_rese,
            ":dad_resa" => $dad_resa,
            ":daf_resa" => $daf_resa,
            ":commentaire" => $commentaire,
            ":moderation" => $moderation,
            ":annulation" => $annulation,
            ":iud" => $iud,
            ":id_bien" => $id_bien,
            ":id_client" => $id_client
        ];

        $sql = "UPDATE reservation SET title = :title, date_rese = :date_rese, dad_resa = :dad_resa, daf_resa = :daf_resa,
        commentaire = :commentaire, moderation = :moderation, annulation = :annulation, iud = :iud, id_bien = :id_bien, id_client = :id_client
        WHERE id_reservation = :id_reservation";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteReservation($id_reservation) {
        $data = [":id_reservation" => $id_reservation];

        $sql = "DELETE FROM reservation WHERE id_reservation = :id_reservation";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectReservationById($id_reservation) {
        $data = [":id_reservation" => $id_reservation];

        $sql = "SELECT * FROM reservation WHERE id_reservation = :id_reservation";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}
?>
