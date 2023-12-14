<?php
require_once '../include/bdd.inc.php';

$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
// Fetch data from the database
$stmt = $con->prepare("SELECT id_type_bien, lib_type_bien FROM type_bien WHERE lib_type_bien LIKE :term");
$stmt->execute(['term' => '%' . $_GET['term'] . '%']);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format the data as JSON
$data = [];
foreach ($result as $row) {
    $data[] = [
    'id' => $row['id_type_bien'],
    'label' => $row['lib_type_bien'],
    'value' => $row['lib_type_bien'],
];

}
echo json_encode($data);

?>
    