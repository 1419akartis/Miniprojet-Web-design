<?php
session_start() ;
    require('traitement/function.php');
    $id =$_GET['id'];
    $select = selectById($id);
    $donnee = mysqli_fetch_assoc($select) ;

?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("../include/headPage.php") ;?>
  </head>
  <body>
    <!-- navbar-->
    <?php include("../include/headerPage.php") ;?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
                  <li class="breadcrumb-item active"><a href="#">Detail</a></li>
                </ol>
              </nav>
            </div>

            <div class="col-lg-9">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div class="item"> <img src="../assets/img/product1.jpg" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="../assets/img/product1.jpg" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="../assets/img/product1.jpg" alt="" class="img-fluid"></div>
                  </div>
                  <!-- /.ribbon-->
                </div>
                <div class="col-md-6">
                  <div class="box">
                    <h1 class="text-center"><?php echo $donnee['nom'];?>
                    </h1>
                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                    <p class="price"><?php echo $donnee['prix'];?>
                    </p>
                    <p class="text-center buttons"><a href="basket.php?ajout=ok&&id=<?php echo $donnee['id'];?>&&nom=<?php echo $donnee['nom'];?>&&desc=<?php echo $donnee['descmedicament'];?>&&prix=<?php echo $donnee['prix'];?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="basket.php" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">
                    <button class="owl-thumb-item"><img src="../assets/img/detailsquare.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="../assets/img/detailsquare2.jpg" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="../assets/img/detailsquare3.jpg" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="details" class="box">
                <!-- <p></p>
                <h4>Product details</h4>
                <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                <h4>Material &amp; care</h4>
                <ul>
                  <li>Polyester</li>
                  <li>Machine wash</li>
                </ul>
                <h4>Size &amp; Fit</h4>
                <ul>
                  <li>Regular fit</li>
                  <li>The model (height 5'8" and chest 33") is wearing a size S</li>
                </ul>
                <blockquote>
                  <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                </blockquote>
                <hr>
                <div class="social">
                  <h4>Show it to your friends</h4>
                  <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                </div> -->
                <p><?php echo $donnee['descmedicament'];?>
                    </p>
              </div>
              <?php include("../include/pub.php") ;?>
            </div>
            <!-- /.col-md-9-->
          </div>
        </div>
      </div>
    </div>
    <?php include("../include/footerPage.php") ;?>
  </body>
</html>
