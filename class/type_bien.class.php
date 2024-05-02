<?php

require_once '../include/bdd.inc.php';

class TypeBien {

    private $id_type_bien;
    private $lib_type_bien;

    // Constructeur
    public function __construct($id, $lib) {
        $this->id_type_bien = $id;
        $this->lib_type_bien = $lib;
    }

    // Récupérer un type de bien par ID
    public static function getTypeBienById($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', 'root');
        $sql = "SELECT * FROM type_bien WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insérer un type de bien
    public static function insertTypeBien($data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', 'root'); 
        $sql = "INSERT INTO type_bien (lib_type_bien) VALUES (:lib)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // Mettre à jour un type de bien
    public static function updateTypeBien($id, $data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', 'root');
        $data[':id'] = $id;
        $sql = "UPDATE type_bien SET lib_type_bien = :lib WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // Supprimer un type de bien par ID
    public static function deleteTypeBien($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', 'root'); 
        $sql = "DELETE FROM type_bien WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    // Récupérer tous les types de biens
    public static function getAllTypesBiens() {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', 'root');
        $sql = "SELECT * FROM type_bien";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
