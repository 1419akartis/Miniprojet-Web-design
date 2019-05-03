<!DOCTYPE html>
<html>
  <head>
    <?php include("include/head.php") ;?>
  </head>
  <body>
    <!-- navbar-->
    <?php require('include/function.php');
    include("include/header.php") ;?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Methode de paiement</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="ordrePayment.php">
                  <!-- <h1>Methode de Paiement</h1> -->
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Address</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-truck">                       </i>Methode de paiement</a><a href="" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Order de paiement</a><a href="" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Revue Facture</a></div>
                  <div class="content py-3">
                    <div class="row" style="height: 450px;">
                      <div class="col-md-6">
                        <div class="box-payment-especes">
                          <h4>Especes</h4>
                          <!-- <p>We like it all.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="1" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box-payment-cheques">
                          <h4>Cheques</h4>
                          <!-- <p>VISA and Mastercard only.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="2" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box-payment-mvola">
                          <h4>Mvola</h4>
                          <!-- <p>You pay when you get it.</p> -->
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="3" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout2.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Retour au panier</a>
                    <button type="submit" class="btn btn-primary">Ordre de Payment<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
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
