<?php 
    session_start() ;
    require('include/function.php');
    $valeur = isset($_GET['valeur'])   ? $_GET['valeur']   : null;
    $client = findbyemail($_SESSION['email']);
    $donneclient = mysqli_fetch_assoc($client);
    $fact = selectfacture($donneclient['idclient']);
    $fact2 = selectfacture($donneclient['idclient']);
    $donne = mysqli_fetch_assoc($fact2) ;
    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Obaju : e-commerce template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <?php include("include/header.php") ;?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Facture</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9" >
              <div class="row" >
                <div id="checkout" class="col-sm-8" s >
                  <div class="box" >
                    <form method="get" action="traitpayerfacture.php">
                      <h1>Facture</h1>
                      <!-- <div class="nav flex-column flex-sm-row nav-pills"><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-map-marker">                  </i>Address</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div> -->
                      <div class="content">
                        <div class="table-responsive">
                          <table class="table">
                          <thead>
                            <tr>
                              <th>Designation</th>
                              <th>Quantite</th>
                              <th>Prix</th>
                              <th>Montant</th>
                            </tr>
                          </thead>
                          <tbody>
                          <form action="traitpayerfacture.php" method="GET">
                          <?php
                            // foreach($_SESSION['panier'] as $id=>$article_achet�){
                              while($donnee = mysqli_fetch_assoc($fact)){
                          ?>
                            <tr>
                              
                              <td><?php echo getNomByidmed($donnee['idmec']);?></td>
                              <td><?php echo $donnee['quantite'];?></td>
                              <td><?php echo $donnee['prix'];?></td>
                              <td><?php echo $donnee['montant'];?></td>
                            </tr>
                            <?php
                               }
                            ?>
                            </form>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="3">Total</th>
                              <th colspan="3"><?php echo number_format($_SESSION['total_panier'], 0, ',', ' '). ' Ar';?></th>
                            </tr>
                          </tfoot>
                          </table>
                        </div>
                        <!-- /.table-responsive-->
                      </div>
                      <!-- <h3>Deja paye : <?php echo $_SESSION['dejapaye'];?></h3> -->
                      <h3>Deja paye : <?php echo number_format($donne['dejapaye'], 0, ',', ' '). ' Ar';?></h3>
                      <!-- <h3>Reste a paye : <?php echo $_SESSION['reste'];?></h3> -->
                      <h3>Reste a paye : <?php echo number_format($donne['reste'], 0, ',', ' '). ' Ar';?></h3>
                      <form action="traitviser.php" method="GET">
                        <div class="input-group">
                        <input type="hidden" value="<?php echo $donne['idclient'];?>" name="idclient">
                        <input type="hidden" value="<?php echo $donne['total'];?>" name="total">
                        <input type="hidden" value="<?php echo $donne['dejapaye'];?>" name="dejapaye">
                          <input type="submit" value="Viser">
                        </div>
                      </form>
                      <?php 
                        if($donne['etat'] ==13){
                      ?>
                      <form action="traitsupp.php" method="GET">
                        <div class="input-group">
                        <input type="hidden" value="<?php echo $donne['idclient'];?>" name="idclient">
                          <input type="submit" value="Supprimer" disabled>
                        </div>
                      </form>
                      <?php
                          }
                      ?>
                      <?php 
                        if($donne['etat'] ==2){
                      ?>
                      <form action="traitsupp.php" method="GET">
                        <div class="input-group">
                        <input type="hidden" value="<?php echo $donne['idclient'];?>" name="idclient">
                          <input type="submit" value="Supprimer" >
                        </div>
                      </form>
                      <?php
                          }
                      ?>
                      <!-- <a href="traitviser.php?idclient=<?php echo $donne['idclient'];?>"><button>Viser</button></a>
                      <a href="traitsupp.php?idclient=<?php echo $donne['idclient'];?>"><button>Supprimer</button></a> -->
                      <?php 
                        if($donne['reste'] ==0){
                      ?>
                        <h2 style="color : #81bb28"><i class="fa fa-check"></i>Tout Payé</h2>
                      <?php
                          }
                      ?>
                      

                      <?php 
                        if($donne['reste'] !=0){
                      ?>
                      <?php 
                        if($donne['etat'] ==3){
                      ?>
                        <h2 style="color : #81bb28"><i class="fa fa-times"></i>Supprimer</h2>
                      <?php
                          }
                      ?>
                      <?php 
                        if($donne['etat'] !=3){
                      ?>
                      <form action="traitpayer.php" method="GET">
                        <p>Payer le reste</p>
                        <div class="input-group">
                        <input type="hidden" value="<?php echo $donne['dejapaye'];?>" name="dejapaye">
                        <input type="hidden" value="<?php echo $donne['reste'];?>" name="reste">
                        <input type="hidden" value="<?php echo $donne['total'];?>" name="total">
                          <input name="valeur" type="text" class=""><span class="input-group-append">
                          <input type="submit" value="Valider">
                        </div>
                      </form>
                      <?php
                          }
                        }
                      ?>
                      <a href="traitexport.php?idclient=<?php echo $donne['idclient'];?>&&remise=<?php echo $_SESSION['remise'];?>" style="float: right;">Exporter en pdf</a>
                      <!-- /.content-->
                      <div class="box-footer d-flex justify-content-between"><a href="historiquefacture.php" class="btn btn-outline-secondary"><i class="fa fa-archive"></i>Voir Historique</a>
                      <?php 
                        if($donne['etat'] ==2){
                      ?>
                        <button type="submit" class="btn btn-primary" disabled>Payer facture<i class="fa fa-chevron-right"></i></button>
                        <?php
                          }
                      ?>
                      <input type="hidden" name="reste" value="<?php echo $donne['reste'];?>">
                      <input type="hidden" name="idclient" value="<?php echo $donne['idclient'];?>">
                      <?php 
                        if($donne['etat'] !=2){
                          if($donne['etat'] !=3){
                          if($donne['etat'] !=1){
                      ?>
                        <button type="submit" class="btn btn-primary" >Payer facture<i class="fa fa-chevron-right"></i></button>
                        <?php
                              }
                            }
                          }
                      ?>
                      </div>
                    </form>
                  </div>
                </div>
                <div id="checkout" class="col-sm-4">
                  <div id="order-summary" class="card">
                    <div class="card-header">
                      <h3 class="mt-4 mb-4">Remise</h3>
                    </div>
                    <div class="card-body">
                      <!-- <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p> -->
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <!-- <tr>
                              <td>Order subtotal</td>
                              <th>$446.00</th>
                            </tr> -->
                            <tr>
                              <td>Total Facture</td>
                              <th><?php echo $_SESSION['total_panier'];?></th>
                            </tr>
                            <tr>
                              <td>Remise</td>
                              <th><?php echo $_SESSION['remise'] * 100?> %</th>
                            </tr>
                            <tr class="total">
                              <td>Total apres remise</td>
                              <th><p style="color : #81bb28"><?php echo number_format($_SESSION['totalapresremise'], 0, ',', ' '). ' Ar';?></p></th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              
            </div>
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
    <?php include("include/footer.php") ;?>
  </body>
</html>