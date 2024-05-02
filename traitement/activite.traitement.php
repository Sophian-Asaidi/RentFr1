<?php

require_once '../class/activite.class.php';

// Ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addActivite'])) {
    $data = [
        ':lib' => $_POST['lib_activite']
    ];

    Activite::insertActivite($data);
}

// Suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteActivite'])) {
    $id = $_POST['delete_id_activite'];

    Activite::deleteActivite($id);
}

// Modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateActivite'])) {
    $id = $_POST['update_id_activite'];
    $data = [
        ':lib' => isset($_POST['lib_activite']) ? $_POST['lib_activite'] : '',
        ':id' => $id,
    ];

    Activite::updateActivite($id, $data);
}

$activites = Activite::getAllActivite();
?>
