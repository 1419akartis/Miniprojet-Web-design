<?php
    session_start() ;
    require('include/function.php');
    $payment = $_GET['payment'];
    $_SESSION['modepayment'] = $payment;
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
                  <li aria-current="page" class="breadcrumb-item active">Ordre de paiement</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <!-- <h1>Ordre de Paiement</h1> -->


                <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="RevueFacture.php">
                  <!-- <h1>Checkout - Payment method</h1> -->
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="ModePayement.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Methode de paiement</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money">                      </i>Order de paiement</a><a href="" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Revue Facture</a></div>
                  <div class="content py-3">
                  <p>Somme à payer au total : <?php echo $_SESSION['total_panier'];?></p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Tout Payer</h4>
                          <!-- <p>We like it all.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="1" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Par tranche</h4>
                          <!-- <p>VISA and Mastercard only.</p> -->
                          <input type="text" name="valeur">
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="2" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout2.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Retour au methode de paiement</a>
                    <button type="submit" class="btn btn-primary">Valider paiement<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="right">
                      <a href="ModePayement.php"><button type="submit" class="btn btn-primary">Payer facture <i class="fa fa-chevron-right"></i></button></a>
                    </div>
                  </div>
              </div>
              <!-- /.box-->
            </div>
            <?php include("include/pub.php") ;?>
            </div>
            <!-- /.col-lg-9-->

            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
    <?php include("include/footer.php") ;?>
  </body>
</html>
