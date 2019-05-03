<?php 
    require('include/function.php');
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    inscrire($nom,$email,$mdp);
    header('Location: register.php?testinsc=Inscription reussie ! ');
?>