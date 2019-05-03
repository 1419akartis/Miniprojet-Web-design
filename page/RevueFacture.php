<?php
    session_start() ;
    require('include/function.php');
    $payment = $_GET['payment'];
    $valeur = $_GET['valeur'];
    if($payment ==2){
        $reste = $_SESSION['total_panier'] - $valeur;
        $_SESSION['dejapaye'] = $valeur;
        $_SESSION['reste'] = $reste;
    }
    else{
        $_SESSION['dejapaye'] = $_SESSION['total_panier'];
        $_SESSION['reste'] = 0;
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("include/head.php") ;?>
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
                  <li aria-current="page" class="breadcrumb-item active">Revue Facture</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">

              <div class="box">
                <form method="get" action="traitementinstdetfact.php">
                  <!-- <h1>Revue du facture</h1> -->
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="ModePayement.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Methode de paiement</a><a href="ordrePayment.php?payment=<?php echo $payment; ?>" class="nav-link flex-sm-fill text-sm-center" > <i class="fa fa-money">                      </i>Order de paiement</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Revue Facture</a></div>
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
                      <form action="#" method="GET">
                      <?php
                        foreach($_SESSION['panier'] as $id=>$article_achet�){
                      ?>
                        <tr>
                          <td><?php echo $article_achet�['nom'];?></td>
                          <td><?php echo $article_achet�['qte'];?></td>
                          <td><?php echo $article_achet�['prix'];?></td>
                          <td><?php echo $article_achet�['mont'];?></td>
                        </tr>
                        <?php
                           }
                        ?>
                        </form>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3">Total</th>
                          <th colspan="3"><?php echo number_format($_SESSION['total_panier'], 0, ',', ' '), ' Ar';?></th>
                        </tr>
                      </tfoot>
                      </table>
                    </div>
                    <!-- /.table-responsive-->
                  </div>
                  <h3>Deja paye : <?php echo number_format($_SESSION['dejapaye'], 0, ',', ' '). ' Ar';?></h3>
                  <h3>Reste a paye : <?php echo number_format($_SESSION['reste'], 0, ',', ' '). ' Ar';?></h3>
                  <!-- <a href=""><button>Viser</button></a> -->
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Retout à l'ordre de paiement</a>
                    <button type="submit" class="btn btn-primary">Valider facture<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <?php include("include/pub.php") ;?>
            <!-- /.col-lg-9-->
            <!-- <div class="col-lg-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Remise</h3>
                </div>
                <div class="card-body">
                  <!-- <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p> -->
                  <!-- <div class="table-responsive"> -->
                    <!-- <table class="table"> -->
                      <!-- <tbody> -->
                        <!-- <tr>
                          <td>Order subtotal</td>
                          <th>$446.00</th>
                        </tr> -->
                        <<!-- tr>
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
            </div> -->
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
    <?php include("include/footer.php") ;?>
  </body>
</html>
