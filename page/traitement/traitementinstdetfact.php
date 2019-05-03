<?php 
    session_start() ;
    require('include/function.php');
    if(isset($_SESSION['panier'] )){
        foreach($_SESSION['panier'] as $id=>$article_achet�){
          insertdetailfacture($article_achet�['id'],$article_achet�['qte'],$article_achet�['prix'],$article_achet�['mont'],0);
          
        }
        $client = findbyemail($_SESSION['email']);
        var_dump($client);
        $donnee = mysqli_fetch_assoc($client);
        insertfacture($donnee['idclient'],$_SESSION['total_panier'],2,$_SESSION['modepayment'],$_SESSION['dejapaye'],$_SESSION['reste']);
        inserthistfacture($donnee['idclient'],$_SESSION['total_panier'],$_SESSION['dejapaye'],$_SESSION['reste']);
    }
    $_SESSION['facture'] = 1;
    header('Location: index.php?active=1');
?>