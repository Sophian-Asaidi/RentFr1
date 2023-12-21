<?php

require_once("../include/bdd.inc.php");
require_once("../class/bien.class.php");

$oBien = new Bien($con);

// Extraction des valeurs du formulaire Bien
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
