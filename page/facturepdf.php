<?php
    require('fpdf.php');
    class PDF extends FPDF{
        function tete($text){
            $this->SetFont('Arial','I',12);
            // Décalage à droite
            $this->Cell(80);
            // Titre centré
            $this->Cell(30,10,'Facture',1,0,'C');
            
            $this->Ln(15);
            $this->Cell(125,10,'Pharmacie Manampy');
            $this->Ln(10);
            $this->Cell(125,10,'Andoharanofotsy');
            $this->Ln(10);
            $this->Cell(125,10,'Telephone: +261 32 21 805 55');
            $this->Ln(10);
            $this->Cell(125,10,'');
            $this->Cell(250,10,'Date: '.$text[3]);
            $this->Ln(10);
            $this->Cell(125,10,'');
            $this->Cell(243,10,'A: '.$text[4]);
            $this->Ln(10);
            // $this->Cell(125,10,'');
            // $this->Cell(248,10,'Mail: '.$text[2]);
            // Saut de ligne
            $this->Ln(20);
        }

        function footer(){
            // $this->Ln(20);
            // Positionnement à 3 cm du bas
            $this->SetY(-30);

            $this->SetFont('Arial','I',12);
            $this->Cell(300,10,'Responsable',0,1,'C');
            $this->Ln(1);
            $this->Cell(298,10,'Pharmacie Manampy',0,1,'C');
        }

        // Chargement des données
        function LoadData($file)
        {
            // Lecture des lignes du fichier
            $lines = file($file);
            $data = array();
            foreach($lines as $line)
                $data[] = explode(';',trim($line));
            return $data;
        }

        function evenement($evenement){
            $this->Cell(10,10,'A propos : ');
            $this->Ln(10);
            $this->SetFont('Arial','I',12);
            $this->Cell(10,10,'Remise: '.($evenement[5]*100).' %');
            $this->Ln(10);
            $this->Cell(10,10,'Deja Paye: '.$evenement[0].' Ar');
            $this->Ln(10);
            $this->Cell(10,10,'Reste a paye: '.$evenement[1].' Ar');
        }

        function tableau($header, $data)
        {
            $this->Cell(10,10,'Detail: ');
            $this->Ln(10);
            // En-tête
            foreach($header as $col)
                $this->Cell(40,7,$col,1);
            $this->Ln();
            // Données
            foreach($data as $row)
            {
                foreach($row as $col)
                    $this->Cell(40,6,$col,1);
                $this->Ln();
            }
            $this->Ln(10);
        }
        function prixtotal($donnees){
            $this->Ln(10);
            $this->SetFont('Times','B',16);
            $this->Cell(10,10,'Net a payer: '.$donnees[2].' Ar');
            $this->Ln(20);
        }

        
    }

    $pdf = new PDF();
    
    $enTete = array('Designation','Quantite','Prix','Montant');
    // $enTetePrest = array('Nom Prestation','Categorie','Prix (Ar)');
    // $fichierPack = $pdf->LoadData('pack.csv');
    $donnetab = $pdf->LoadData('donnetab.csv');
    
    //lecture de text
    $text = file('donneinfo.txt');
    // $evenement = file('evenement.txt');

    $pdf->SetFont('Times','',16);
    
    $pdf->AddPage();
    $pdf->tete($text);
    $pdf->Line(10, 90, 190, 90);
    $pdf->Line(10, 160, 190, 160);
    
    // $pdf->tableauPack($enTetePack,$fichierPack);
    
    $pdf->tableau($enTete,$donnetab);
    
    
    $pdf->prixtotal($text);
    $pdf->evenement($text);
    //$pdf->AddPage();
    // $pdf->total($somme);
    
    $pdf->Output();
?>