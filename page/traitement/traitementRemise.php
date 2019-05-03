<?php 
    session_start() ;
    require('include/function.php');
    $mont = $_GET['montant'];
    $remise = $_GET['remise'];
    insertRemise($mont,$remise);
    header('Location: configremise.php');
  ?>