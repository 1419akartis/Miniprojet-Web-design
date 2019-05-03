<?php 
    session_start() ;
    require('include/function.php');
    $idclient = $_GET['idclient'];
    supprimer($idclient);
    header('Location: facture.php');
?>