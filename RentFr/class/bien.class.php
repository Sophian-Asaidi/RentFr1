<?php

require_once '../include/bdd.inc.php';

class Bien {

    private $con;
    private $id_bien;
    private $nom_bien;
    private $rue_bien;
    private $cop_bien;
    private $vil_bien;
    private $sup_bien;
    private $nb_couchage;
    private $nb_piece;
    private $nb_chambre;
    private $descriptif;
    private $ref_bien;
    private $statu_bien;
    private $id_type_bien;

    // Constructeur
    public function __construct($c) {
        $this->con = $c;
    }

    // Getters
    public function getIdBien() {
        return $this->id_bien;
    }

    public function getNomBien() {
        return $this->nom_bien;
    }

    public function getRueBien() {
        return $this->rue_bien;
    }

    public function getCopBien() {
        return $this->cop_bien;
    }

    public function getVilBien() {
        return $this->vil_bien;
    }

    public function getSupBien() {
        return $this->sup_bien;
    }

    public function getNbCouchage() {
        return $this->nb_couchage;
    }

    public function getNbPiece() {
        return $this->nb_piece;
    }

    public function getNbChambre() {
        return $this->nb_chambre;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function getRefBien() {
        return $this->ref_bien;
    }

    public function getStatuBien() {
        return $this->statu_bien;
    }

    public function getIdTypeBien() {
        return $this->id_type_bien;
    }

    // Setters
    public function setNomBien($n) {
        $this->nom_bien = $n;
    }

    public function setRueBien($r) {
        $this->rue_bien = $r;
    }

    public function setCopBien($c) {
        $this->cop_bien = $c;
    }

    public function setVilBien($v) {
        $this->vil_bien = $v;
    }

    public function setSupBien($s) {
        $this->sup_bien = $s;
    }

    public function setNbCouchage($n) {
        $this->nb_couchage = $n;
    }

    public function setNbPiece($n) {
        $this->nb_piece = $n;
    }

    public function setNbChambre($n) {
        $this->nb_chambre = $n;
    }

    public function setDescriptif($d) {
        $this->descriptif = $d;
    }

    public function setRefBien($r) {
        $this->ref_bien = $r;
    }

    public function setStatuBien($s) {
        $this->statu_bien = $s;
    }

    public function setIdTypeBien($id) {
        $this->id_type_bien = $id;
    }

    // Fonctions
    public function selectBien() {
        $sql = "SELECT * FROM biens";
        $stmt = $this->con->query($sql);
        return $stmt;
    }

    public function insertBien($nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $ref_bien, $statu, $idType) {
        $data = [
            ":nom" => $nom,
            ":rue" => $rue,
            ":cop" => $cop,
            ":vil" => $vil,
            ":sup" => $sup,
            ":nbCouchage" => $nbCouchage,
            ":nbPiece" => $nbPiece,
            ":nbChambre" => $nbChambre,
            ":descriptif" => $descriptif,
            ":ref_bien" => $ref_bien,
            ":statu" => $statu,
            ":idType" => $idType
        ];

        $sql = "INSERT INTO biens (nom_bien, rue_bien, cop_bien, vil_bien, sup_bien, nb_couchage, nb_piece, nb_chambre, descriptif, ref_bien, statu_bien, id_type_bien)
        VALUES (:nom, :rue, :cop, :vil, :sup, :nbCouchage, :nbPiece, :nbChambre, :descriptif, :ref_bien, :statu, :idType)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function updateBien($id, $nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $ref_bien, $statu, $idType) {
        $data = [
            ":idb" => $id,
            ":nom" => $nom,
            ":rue" => $rue,
            ":cop" => $cop,
            ":vil" => $vil,
            ":sup" => $sup,
            ":nbCouchage" => $nbCouchage,
            ":nbPiece" => $nbPiece,
            ":nbChambre" => $nbChambre,
            ":descriptif" => $descriptif,
            ":ref_bien" => $ref_bien,
            ":statu" => $statu,
            ":idType" => $idType
        ];

        $sql = "UPDATE biens SET nom_bien = :nom, rue_bien = :rue, cop_bien = :cop, vil_bien = :vil, sup_bien = :sup, 
        nb_couchage = :nbCouchage, nb_piece = :nbPiece, nb_chambre = :nbChambre, descriptif = :descriptif, 
        ref_bien = :ref_bien, statu_bien = :statu, id_type_bien = :idType
        WHERE id_bien = :idb";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteBien($id) {
        $data = [":idb" => $id];

        $sql = "DELETE FROM biens WHERE id_bien = :idb";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    public function selectBienById($id) {
        $data = [":idb" => $id];

        $sql = "SELECT nom_bien, rue_bien, cop_bien, vil_bien, sup_bien, nb_couchage, nb_piece, nb_chambre, descriptif, ref_bien, statu_bien, id_type_bien
        FROM biens 
        WHERE id_bien = :idb";

        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
public function getIdTypeByLabel($label) {
    $stmt = $this->con->prepare("SELECT id_type_bien FROM type_bien WHERE lib_type_bien = :label");
    $stmt->execute(['label' => $label]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return !empty($result['id_type_bien']) ? $result['id_type_bien'] : null;
}

public function getTypeLabelById($id) {
        $stmt = $this->con->prepare("SELECT lib_type_bien FROM type_bien WHERE id_type_bien = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($result['lib_type_bien']) ? $result['lib_type_bien'] : 'Type not found';
    }

}

?>
