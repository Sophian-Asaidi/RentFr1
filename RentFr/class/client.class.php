<?php

require_once '../include/bdd.inc.php';

class Client {

    private $con;
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $cop_client;
    private $vil_client;
    private $mail_client;
    private $pass_client;
    private $statut_client;
    private $valid_client;

    // Constructeur
    public function __construct($c) {
        $this->con = $c;
    }

    // Getters
    public function getIdClient() {
        return $this->id_client;
    }

    public function getNomClient() {
        return $this->nom_client;
    }

    public function getPrenomClient() {
        return $this->prenom_client;
    }

    public function getCopClient() {
        return $this->cop_client;
    }

    public function getVilClient() {
        return $this->vil_client;
    }

    public function getMailClient() {
        return $this->mail_client;
    }

    public function getPassClient() {
        return $this->pass_client;
    }

    public function getStatutClient() {
        return $this->statut_client;
    }

    public function getValidClient() {
        return $this->valid_client;
    }

    // Setters
    public function setNomClient($l) {
        $this->nom_client = $l;
    }

    public function setPrenomClient($l) {
        $this->prenom_client = $l;
    }

    public function setCopClient($l) {
        $this->cop_client = $l;
    }

    public function setVilClient($l) {
        $this->vil_client = $l;
    }

    public function setMailClient($l) {
        $this->mail_client = $l;
    }

    public function setPassClient($l) {
        $this->pass_client = $l;
    }

    public function setValidClient($l) {
        $this->valid_client = $l;
    }

    // Fonctions
    public function selectClient() {
        $sql = "SELECT * FROM client";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertClient($nom, $prenom, $cop, $vil, $mail, $pass, $statut, $valid) {
        $data = [
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":cop" => $cop,
            ":vil" => $vil,
            ":mail" => $mail,
            ":pass" => $pass,
            ":statut" => $statut,
            ":valid" => $valid
        ];

        $sql = "INSERT INTO client (nom_client, prenom_client, cop_client, vil_client, mail_client, pass_client, statut_client, valid_client)
        VALUES (:nom, :prenom, :cop, :vil, :mail, :pass, :statut, :valid)";
        $con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateClient($id, $nom, $prenom, $cop, $vil, $mail, $pass, $statut, $valid) {
        $data = [
            ":idc" => $id,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":cop" => $cop,
            ":vil" => $vil,
            ":mail" => $mail,
            ":pass" => $pass,
            ":statut" => $statut,
            ":valid" => $valid
        ];

        $sql = "UPDATE client SET nom_client = :nom, prenom_client = :prenom, cop_client = :cop, vil_client = :vil,
        mail_client = :mail, pass_client = :pass, statut_client = :statut, valid_client = :valid
        WHERE id_client = :idc";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteClient($id) {
        $data = [":idc" => $id];

        $sql = "DELETE FROM client WHERE id_client = :idc";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectById($id) {
        $data = [":idc" => $id];

        $sql = "SELECT nom_client, prenom_client, cop_client, vil_client, mail_client, pass_client, statut_client, valid_client
        FROM client 
        WHERE id_client = :idc";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}
?>
