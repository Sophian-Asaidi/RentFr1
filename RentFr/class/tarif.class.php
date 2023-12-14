<?php

require_once '../include/bdd.inc.php';

class tarif{
    private $id_tarif;
    private $dad_tarif;
    private $daf_tarif;
    private $prix_loc;
    private $id_bien;
    
    public function __construct($id, $dad, $daf, $prix, $id_bien) {
        $this->id_tarif = $id;
        $this->dad_tarif = $dad;
        $this->daf_tarif = $daf;
        $this->prix_loc = $prix;
        $this->id_bien = $id_bien;
    }
    
    
}