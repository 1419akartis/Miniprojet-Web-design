<?php
    session_start() ;
    require('include/function.php');
    // $fact = selectAllfacture();
    $colonne = isset($_GET['trie'])  ? $_GET['trie']   : "idfact";
    $deb = isset($_GET['deb']) ? $_GET['deb'] : 0;
    $fact = getListFacturePaginationTrie($deb,$colonne);
    // $idcat1 = getNbProuduitVenduParDateParCateg(2,"2019-01-19","2019-01-25");
    // $idcat2 = getNbProuduitVenduParDateParCateg(3,"2019-01-19","2019-01-25");
    // $idcat3 = getNbProuduitVenduParDateParCateg(4,"2019-01-19","2019-01-25");
    // $fact = getListFacturePagination(0);

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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Checkout - Order review</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">

                  <h1>Liste Facture</h1>
                  <!-- <div class="nav flex-column flex-sm-row nav-pills"><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-map-marker">                  </i>Address</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Delivery Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Payment Method</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Order Review</a></div> -->
                  <div class="box info-bar">
                    <div class="row">
                    <div class="col-md-12 col-lg-7 products-number-sort">
                      <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row" action="" method="GET">
                        <div class="products-sort-by mt-2 mt-lg-0"><strong>Trier par</strong>
                              <select name="trie" class="form-control">
                                <option value="datefact">Date</option>
                                <option value="nomclient">Nom Client</option>
                                <option value="etat">Etat</option>
                                <option value="idmeth">Id Meth Paye</option>
                                <option value="total">Total</option>
                                <option value="dejapaye">Deja paye</option>
                                <option value="reste">Reste</option>
                              </select>
                              <input type="submit" value="Valider">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                  <div class="content">
                    <div class="table-responsive">
                      <table class="table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Id Client</th>
                          <th>Etat</th>
                          <th>Id Meth Paye</th>
                          <th>Total</th>
                          <th>Deja Paye</th>
                          <th>Reste</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <!-- <form action="historiquefacture.php" method="GET"> -->
                      <?php
                        // foreach($_SESSION['panier'] as $id=>$article_achet�){
                            $i=0;
                            while($donnee = mysqli_fetch_assoc($fact)){
                      ?>
                        <tr>

                          <td><?php echo $donnee['datefact'];?></td>
                          <td><?php echo $donnee['idclient'];?></td>
                          <td><?php echo $donnee['etat'];?></td>
                          <td><?php echo $donnee['idmeth'];?></td>
                          <td><?php echo $donnee['total'];?></td>
                          <td><?php echo $donnee['dejapaye'];?></td>
                          <td><?php echo $donnee['reste'];?></td>
                          <!-- <input type="hidden" name="idclient<?php echo $i+1;?>" value="<?php echo $donnee['idclient'];?>">
                          <td><input type="submit" value="Detail"></td> -->
                          <td><a href="historiquefacture.php?idclient=<?php echo $donnee['idclient'];?>"><button>Detail</button></a></td>
                        </tr>
                        <?php
                            $i++;
                           }
                        ?>
                        <!-- </form> -->
                      </tbody>
                      <tfoot>
                        <tr>
                        </tr>
                      </tfoot>
                      </table>
                    </div>
                    <!-- /.table-responsive-->
                            
                  </div>

                <a href="ListeFacture.php?deb=<?php echo $deb-8?>"><button>Prev</button></a>
                <a href="ListeFacture.php?deb=0"><button>1</button></a>
                <a href="ListeFacture.php?deb=9"><button>2</button></a>
                <a href="ListeFacture.php?deb=<?php echo $deb+8?>"><button>Next</button></a>
              </div>
              <script type="text/javascript">
                          google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Categorie Medicaments', 'Nombre Stock'],
                              ['Par symptome',     11],
                              ['Par maladie',      2],
                              ['Homeopathie et medecine douces',  2],
                            ]);

                            var options = {
                              title: 'Statistiques'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                          }
                        </script>
                     <div id="piechart" style="width: 900px; height: 500px;"></div>
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
