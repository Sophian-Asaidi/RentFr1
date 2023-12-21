<?php

require_once '../class/bien.class.php';
require_once '../include/bdd.inc.php';
//$con = new PDO("mysql:host=localhost;dbname=rentfr", "root", "");
$oBien = new Bien($con);

if (isset($_POST['updateBien'])) {
    $id_bien = $_POST['updateBien'];
    $nom_bien = $_POST['nom_bien'][$id_bien];
    $rue_bien = $_POST['rue_bien'][$id_bien];
    $cop_bien = $_POST['cop_bien'][$id_bien];
    $vil_bien = $_POST['vil_bien'][$id_bien];
    $sup_bien = $_POST['sup_bien'][$id_bien];
    $nb_couchage = $_POST['nb_couchage'][$id_bien];
    $nb_piece = $_POST['nb_piece'][$id_bien];
    $nb_chambre = $_POST['nb_chambre'][$id_bien];
    $descriptif = $_POST['descriptif'][$id_bien];
    $ref_bien = $_POST['ref_bien'][$id_bien];
    $statu_bien = $_POST['statu_bien'][$id_bien];
    $lib_type_bien = $_POST['lib_type_bien'][$id_bien];

    $id_type_bien = $oBien->getIdTypeByLabel($lib_type_bien);

    $oBien->updateBien($id_bien, $nom_bien, $rue_bien, $cop_bien, $vil_bien, $sup_bien, $nb_couchage, $nb_piece, $nb_chambre, $descriptif, $ref_bien, $statu_bien, $id_type_bien);
} elseif (isset($_POST['deleteBien'])) {
    $id = $_POST['deleteBien'];
    $oBien->deleteBien($id);
}

$nvNomBien = $_POST['nom_bien'];
$nvRueBien = $_POST['rue_bien'];
$nvCopBien = $_POST['cop_bien'];
$nvVilleBien = $_POST['vil_bien'];
$nvSupBien = $_POST['sup_bien'];
$nvNbCouchage = $_POST['nb_couchage'];
$nvNbPiece = $_POST['nb_piece'];
$nvNbChambre = $_POST['nb_chambre'];
$nvDescriptif = $_POST['descriptif'];
$nvRefBien = $_POST['ref_bien'];
$nvStatuBien = $_POST['statu_bien'];
$nvLibTypeBien = $_POST['lib_type_bien'];

$stmt = $con->prepare("SELECT id_type_bien FROM type_bien WHERE lib_type_bien = :label");
$stmt->execute(['label' => $nvLibTypeBien]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($result['id_type_bien'])) {
    $nvIdTypeBien = $result['id_type_bien'];

    $oNouveauBien = new Bien($con);

    $oNouveauBien->insertBien(
            $nvNomBien, $nvRueBien, $nvCopBien, $nvVilleBien, $nvSupBien,
            $nvNbCouchage, $nvNbPiece, $nvNbChambre, $nvDescriptif,
            $nvRefBien, $nvStatuBien, $nvIdTypeBien
    );

    header("location:../affichage/aff_bien.php");
} else {

    echo "Error: Type de Bien pas trouvé.";
}

header("location:../affichage/aff_bien.php");
?>
