<?php
    session_start() ;
    if(!isset($_SESSION['email'])){
      header('Location: page/register.php');
    }

  ?>
<!DOCTYPE html>
<html>
  <head>
  <?php include("include/head.php") ;?>
  </head>
  <body>
  <?php
      require('page/traitement/function.php');
      $cat= cat();
      $souscat= souscatByIdcat(1);
      $listmedic = selectMedicRand();
  ?>

    <?php include("include/header.php") ;?>


    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="main-slider" class="owl-carousel owl-theme">
                <div class="item"><img src="assets/img/main-slider1.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="assets/img/main-slider2.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="assets/img/main-slider3.jpg" alt="" class="img-fluid"></div>
                <div class="item"><img src="assets/img/main-slider4.jpg" alt="" class="img-fluid"></div>
              </div>
              <!-- /#main-slider-->
            </div>

          </div>
        </div>
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->

        <div id="advantages">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-truck"></i></div>
                  <h3><a href="#">Meilleur Service</a></h3>
                  <p class="mb-0">Nous engageons des equipes professionnels pour vous satisfaire.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                  <h3><a href="#">100% garantie</a></h3>
                  <p class="mb-0">Tout nos medicaments sont fortement conseillés par les medecins.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                  <div class="icon"><i class="fa fa-tags"></i></div>
                  <h3><a href="#">Meilleur prix</a></h3>
                  <p class="mb-0">Avec nous,meilleurs medicaments pour des meilleurs prix.</p>
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
          <!-- /.container-->
        </div>
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id="hot">
          <div class="box py-4">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="mb-0">Les plus commandés</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="product-slider owl-carousel owl-theme">
            <?php?>
            <?php
                while($donnee = mysqli_fetch_assoc($listmedic))
                {
            ?>
              <div class="item">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="detail.php"><img src="assets/img/product1.jpg" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="detail.php"><img src="assets/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                    </div>
                  </div><a href="detail.php" class="invisible"><img src="assets/img/product1.jpg" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="detail.php"><?php echo $donnee['nom'];?></a></h3>
                    <h3><a href="detail.php"><?php echo $donnee['descmedicament'];?></a></h3>
                    <p class="price">
                      <del></del><?php echo $donnee['prix'];?>
                    </p>
                  </div>
                  <!-- /.text-->
                  <!-- <div class="ribbon sale">
                    <div class="theribbon">SALE</div>
                    <div class="ribbon-background"></div>
                  </div> -->
                  <!-- /.ribbon-->
                  <!-- <div class="ribbon new">
                    <div class="theribbon">NEW</div>
                    <div class="ribbon-background"></div>
                  </div> -->
                  <!-- /.ribbon-->
                  <!-- <div class="ribbon gift">
                    <div class="theribbon">GIFT</div>
                    <div class="ribbon-background"></div>
                  </div> -->
                  <!-- /.ribbon -->
                  <p class="text-center buttons"><a href="page/basket.php?ajout=ok&&id=<?php echo $donnee['id'];?>&&nom=<?php echo $donnee['nom'];?>&&desc=<?php echo $donnee['descmedicament'];?>&&prix=<?php echo $donnee['prix'];?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a></p>
                </div>
                <!-- /.product-->
              </div>
            <?php
              }
            ?>

              <!-- /.product-slider-->
            </div>
            <!-- /.container-->
          </div>
          <!-- /#hot-->
          <!-- *** HOT END ***-->
        </div>
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->

        <div class="container">
          <div class="col-md-12">
            <div class="box slideshow">
              
              <h3>Get Inspired</h3>
              <p class="lead">Get the inspiration from our world class designers</p>
              <div id="get-inspired" class="owl-carousel owl-theme">
                <div class="item"><a href="#"><img src="assets/img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="assets/img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
                <div class="item"><a href="#"><img src="assets/img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- *** GET INSPIRED END ***-->
        <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->
        <div class="box text-center">
          <div class="container">
            <div class="col-md-12">
              <h3 class="text-uppercase">A propos</h3>
              <p class="lead mb-0">What's new in the world of fashion? <a href="blog.php">Check our blog!</a></p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-md-12">
            <div id="blog-homepage" class="row">
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="post.php">Fashion now</a></h4>
                  <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a></p>
                  <hr>
                  <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                  <p class="read-more"><a href="post.php" class="btn btn-primary">Continue reading</a></p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="post">
                  <h4><a href="post.php">Who is who - example blog post</a></h4>
                  <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a></p>
                  <hr>
                  <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                  <p class="read-more"><a href="post.php" class="btn btn-primary">Continue reading</a></p>
                </div>
              </div>
            </div>
            <!-- /#blog-homepage-->
          </div>
        </div>
        <!-- /.container-->
        <!-- *** BLOG HOMEPAGE END ***-->
      </div>
    </div>

    <?php include("include/footer.php") ;?>


    </div>

    </div>
    
  </body>
</html>
