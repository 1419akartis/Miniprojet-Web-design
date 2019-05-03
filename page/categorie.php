<?php
session_start() ;
    require('traitement/function.php');
    $idcat =$_GET['idcat'];
    $idsouscat =$_GET['idsouscat'];
    $deb = isset($_GET['deb']) ? $_GET['deb'] : 0;
    $colonne = isset($_GET['trie'])  ? $_GET['trie']   : "id";
    // $select = selectcatsouscatPagination($idcat,$idsouscat,$deb);
    $select = selectcatsouscatPaginationtrie($idcat,$idsouscat,$deb,$colonne);
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
                  <li aria-current="page" class="breadcrumb-item active">Categorie</li>
                </ol>
              </nav>
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing"> <strong><?php echo $deb+1;?></strong> à <strong><?php echo $deb+8?></strong> medicaments affichés</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row" action="" method="GET">
                      <!-- <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div> -->
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                        <select name="trie" class="form-control">
                          <option value="nom">Nom</option>
                          <option value="descmedicament">Description</option>
                          <option value="prix">Prix</option>
                        </select>
                        <input type="hidden" name="idcat" value="<?php echo $idcat;?>">
                        <input type="hidden" name="idsouscat" value="<?php echo $idsouscat;?>">
                        <input type="submit" value="Valider">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="row products">
              <?php
                while($donnee = mysqli_fetch_assoc($select))
                {
                ?>
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detailMedic.php?id=<?php echo $donnee['id'];?>"><img src="../assets/img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detailMedic.php?id=<?php echo $donnee['id'];?>"><img src="../assets/img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detailMedic.php?id=<?php echo $donnee['id'];?>" class="invisible"><img src="../assets/img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="detailMedic.php?id=<?php echo $donnee['id'];?>"><?php echo $donnee['nom'];?></a></h3>
                      <h3><a href="detailMedic.php?id=<?php echo $donnee['id'];?>"><?php echo $donnee['descmedicament'];?></a></h3>
                      <p class="price">
                        <del></del><?php echo $donnee['prix'];?>
                      </p>
                      <p class="buttons"><a href="detailMedic.php?id=<?php echo $donnee['id'];?>" class="btn btn-outline-secondary">View detail</a><a href="basket.php?ajout=ok&&id=<?php echo $donnee['id'];?>&&nom=<?php echo $donnee['nom'];?>&&desc=<?php echo $donnee['descmedicament'];?>&&prix=<?php echo $donnee['prix'];?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <?php
              }
            ?>
              <div class="pages">
                <!-- <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p> -->
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <!-- <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li> -->
                    <li class="page-item"><a href="categorie.php?deb=<?php echo $deb-8;?>&&idcat=<?php echo $idcat;?>&&idsouscat=<?php echo $idsouscat;?>" aria-label="Next" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Prev</span></a></li>
                    <li class="page-item"><a href="categorie.php?deb=0&&idcat=<?php echo $idcat;?>&&idsouscat=<?php echo $idsouscat;?>" class="page-link">1</a></li>
                    <li class="page-item"><a href="categorie.php?deb=9&&idcat=<?php echo $idcat;?>&&idsouscat=<?php echo $idsouscat;?>" class="page-link">2</a></li>
                    <!-- <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li> -->
                    <li class="page-item"><a href="categorie.php?deb=<?php echo $deb+8;?>&&idcat=<?php echo $idcat;?>&&idsouscat=<?php echo $idsouscat;?>" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                  </ul>
                </nav>
              </div>
              <?php include("../include/pub.php") ;?>
            </div>
            <!-- /.col-lg-9-->
          </div>
        </div>
      </div>
    </div>
    <?php include("../include/footerPage.php") ;?>  </body>
</html>
