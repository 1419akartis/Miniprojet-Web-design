 <?php
    require('include/function.php');
    $idclient = $_GET['idclient'];
    $remise = $_GET['remise'];
    $fact = selectfacture($idclient);
    $fact2 = selectfacture($idclient);
    $file = fopen('donnetab.csv', "w+");
    while($donne = mysqli_fetch_assoc($fact) ) {
        // echo $donnees['nom'].";".$donnees['dateReservation'].";".$donnees['type'].";".$donnees['prixTotal'].";".$donnees['description']."</br>";
        fputs($file, getNomByidmed($donne['idmec']).";".$donne['quantite'].";".$donne['prix'].";".$donne['montant']."\r\n");
    }
    fclose($file);	
    $file2 = fopen('donneinfo.txt', "w+");
    $donne2 = mysqli_fetch_assoc($fact2) ;
        // echo $donnees['nom'].";".$donnees['dateReservation'].";".$donnees['type'].";".$donnees['prixTotal'].";".$donnees['description']."</br>";
        fputs($file2, $donne2['dejapaye']."\r\n");
        fputs($file2, $donne2['reste']."\r\n");
        fputs($file2, $donne2['total']."\r\n");
        fputs($file2, $donne2['datefact']."\r\n");
        fputs($file2, getNomByid($donne2['idclient'])."\r\n");
        fputs($file2, $remise."\r\n");
    
    fclose($file2);
    header('Location: facturepdf.php');
 ?>