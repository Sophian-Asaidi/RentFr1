<?php
 require_once '../class/type_bien.class.php';

// Ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addTypeBien'])) {
    $data = [
        ':lib' => $_POST['lib_type_bien']
    ];

    TypeBien::insertTypeBien($data);
}

// Suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteTypeBien'])) {
    $id = $_POST['delete_id_type_bien'];

    TypeBien::deleteTypeBien($id);
}

// Modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateTypeBien'])) {
    $id = $_POST['update_id_type_bien'];
    $data = [
        ':lib' => isset($_POST['lib_type_bien']) ? $_POST['lib_type_bien'] : '',
        ':id' => $id,
    ];

    TypeBien::updateTypeBien($id, $data);
}


$typesBiens = TypeBien::getAllTypesBiens();
?>


