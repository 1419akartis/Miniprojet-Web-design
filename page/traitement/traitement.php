<?php
    session_start() ;
    require('function.php');
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $test = login($email,$mdp);
    $test2 = select();

    while($donnee = mysqli_fetch_assoc($test)){
        var_dump($donnee['count']);
        if($donnee['count']=='0'){
            header('Location: ../register.php?testlog=Email ou Mot de passe incorrect !');
        }
        else{
            $_SESSION['email'] = $email;
            $_SESSION['mdp'] = $mdp;
            header('Location: ../../index.php?active=1');
        }
    }
    // var_dump($test3);
    // if($test['count']==0){
    //     header('Location : ../register.php');
    // }
    // else{
    //     $_SESSION['email'] = $email;
    //     $_SESSION['mdp'] = $mdp;
    //     header('Location : ../index.php');
    // }
?>