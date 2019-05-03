<?php 
    session_start() ;
    require('include/function.php');
    $idclient = $_GET['idclient'];
    $dejapaye = $_GET['dejapaye'];
    $totalapresremise =$_SESSION['totalapresremise'];
    $reste =$totalapresremise - $dejapaye;
    viser($idclient,$totalapresremise,$reste);
    header('Location: facture.php');
?>