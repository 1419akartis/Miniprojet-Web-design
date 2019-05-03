<?php
    class Medicament{
        private $id;
        private $reference;
        private $nom;
        private $categorie;
        private $unite;
        private $quantite;
        private $descmedicament;
        private $modeadministration;
        private $femmeenceinte;
        private $allaitement;
        private $pourqui;

        public function __construct($id,$reference,$nom,$categorie,$unite,$quantite,$descmedicament,$modeadministration,$femmeenceinte,$allaitement,$pourqui){
            $this->$id = $id;
            $this->$reference = $reference;
            $this->$nom = $nom;
            $this->$categorie = $categorie;
            $this->$unite = $unite;
            $this->$quantite = $quantite;
            $this->$descmedicament = $descmedicament;
            $this->$modeadministration = $modeadministration;
            $this->$femmeenceinte = $femmeenceinte;
            $this->$allaitement = $allaitement;
            $this->$pourqui = $pourqui;
        }
    }1

?>