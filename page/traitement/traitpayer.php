<?php 
    session_start() ;
    require('include/function.php');
    $valeur = $_GET['valeur'];
    $dejapaye = $_GET['dejapaye'];
    $reste = $_GET['reste'];
    $total = $_GET['total'];
    // $reste = $_SESSION['reste'] - $valeur;
    // $_SESSION['dejapaye'] = $_SESSION['dejapaye'] + $valeur;
    // $_SESSION['reste'] = $reste;
    $restenouv = $reste - $valeur;
    $dejapayenouv = $dejapaye + $valeur;
    $client = findbyemail($_SESSION['email']);
    $donnee = mysqli_fetch_assoc($client);
    updatefacture($dejapayenouv,$restenouv,$donnee['idclient']);
    inserthistfacture($donnee['idclient'],$total,$dejapayenouv,$restenouv);
    header('Location: facture.php');
  ?>