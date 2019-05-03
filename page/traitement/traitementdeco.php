<?php 
    session_start() ;
    unset($_SESSION['email']);
    unset($_SESSION['mdp']);
    if(isset($_SESSION['panier'])){
        foreach($_SESSION['panier'] as $id=>$article_achet�){
            unset($_SESSION['panier'][$id]); 
        }
    }
    unset($_SESSION['facture']);
    unset($_SESSION['total_panier']);
    unset($_SESSION['totalapresremise']);
    unset($_SESSION['remise']);
    header('Location: ../../index.php');
  ?>