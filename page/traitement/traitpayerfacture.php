<?php 
    session_start() ;
    require('include/function.php');
    $idclient = $_GET['idclient'];
    $reste = $_GET['reste'];
    payer($idclient,$reste);
    header('Location: index.php?active=1');
  ?>