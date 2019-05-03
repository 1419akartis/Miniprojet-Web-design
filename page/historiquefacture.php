<?php
    session_start() ;
    require('include/function.php');
    if(isset($_GET['idclient'])){

      $hist = selecthistfacture($_GET['idclient']);
    }
    if(!isset($_GET['idclient'])){
      $client = findbyemail($_SESSION['email']);
      $val = mysqli_fetch_assoc($client);
      $hist = selecthistfacture($val['idclient']);
    }
?>
<!DOCTYPE html>
<html>
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
                  <li aria-current="page" class="breadcrumb-item active">Historique Facture</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="traitvalidfact.php">
                  <div class="content">
                    <div class="table-responsive">
                      <table class="table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Total</th>
                          <th>Deja paye</th>
                          <th>Reste</th>
                        </tr>
                      </thead>
                      <tbody>
                      <form action="#" method="GET">
                      <?php
                        while($donnee = mysqli_fetch_assoc($hist)){
                      ?>
                        <tr>
                          <td><?php echo $donnee['datehist'];?></td>
                          <td><?php echo $donnee['total'];?></td>
                          <td><?php echo $donnee['dejapaye'];?></td>
                          <td><?php echo $donnee['reste'];?></td>
                        </tr>
                        <?php
                           }
                        ?>
                        </form>
                      </tbody>
                      <tfoot>
                        <tr>

                        </tr>
                      </tfoot>
                      </table>
                    </div>
                    <!-- /.table-responsive-->
                  </div>

                  <!-- /.content-->
                  <?php
                    if(isset($_GET['idclient'])){
                  ?>
                  <div class="box-footer d-flex justify-content-between"><a href="ListeFacture.php" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>Revenir</a>
                  <?php
                      }
                  ?>
                  <?php
                    if(!isset($_GET['idclient'])){
                  ?>
                  <div class="box-footer d-flex justify-content-between"><a href="facture.php" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i>Revenir</a>
                  <?php
                      }
                  ?>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->

            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Pages</h4>
            <ul class="list-unstyled">
              <li><a href="text.php">About us</a></li>
              <li><a href="text.php">Terms and conditions</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="contact.php">Contact us</a></li>
            </ul>
            <hr>
            <h4 class="mb-3">User section</h4>
            <ul class="list-unstyled">
              <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
              <li><a href="register.php">Regiter</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Top categories</h4>
            <h5>Men</h5>
            <ul class="list-unstyled">
              <li><a href="category.php">T-shirts</a></li>
              <li><a href="category.php">Shirts</a></li>
              <li><a href="category.php">Accessories</a></li>
            </ul>
            <h5>Ladies</h5>
            <ul class="list-unstyled">
              <li><a href="category.php">T-shirts</a></li>
              <li><a href="category.php">Skirts</a></li>
              <li><a href="category.php">Pants</a></li>
              <li><a href="category.php">Accessories</a></li>
            </ul>
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Where to find us</h4>
            <p><strong>Obaju Ltd.</strong><br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p><a href="contact.php">Go to contact page</a>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Get the news</h4>
            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <form>
              <div class="input-group">
                <input type="text" class="form-control"><span class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary">Subscribe!</button></span>
              </div>
              <!-- /input-group-->
            </form>
            <hr>
            <h4 class="mb-3">Stay in touch</h4>
            <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#" class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
          </div>
          <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->


    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2018 Your name goes here.</p>
          </div>
          <div class="col-lg-6">
            <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious: E-commerce</a>
              <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :)-->
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
