<?php 
    session_start() ;
    require('include/function.php');
    $client = findbyemail($_SESSION['email']);
    $donnee = mysqli_fetch_assoc($client);
    updatefacture($_SESSION['dejapaye'],$_SESSION['reste'],$donnee['idclient']);
    header('Location: index.php?active=1');
  ?>