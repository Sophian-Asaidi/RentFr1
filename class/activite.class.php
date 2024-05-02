<?php

require_once '../include/bdd.inc.php';

class Activite {

    private $id_activite;
    private $lib_activite;
    private $con;

    // Constructeur
    public function __construct($c) {
        //$this->id_activite = $id;
        //$this->lib_activite = $lib;
        $this->con = $c;
    }

    // Récupérer un type de bien par ID
    public function getActiviteById($id) {
        //$con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM activite WHERE id_activite = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insérer un type de bien
    public static function insertActivite($data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', ''); 
        $sql = "INSERT INTO activite (lib_activite) VALUES (:lib)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // Mettre à jour un type de bien
    public function updateActivite($id, $data) {
        //$con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $data[':id'] = $id;
        $sql = "UPDATE activite SET lib_activite = :lib WHERE id_activite = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute($data);
    }

    // Supprimer un type de bien par ID
    public function deleteActivite($id) {
        //$con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', ''); 
        $sql = "DELETE FROM activite WHERE id_activite = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    // Récupérer tous les types de biens
    public function getAllActivite() {
        //$con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM activite";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

