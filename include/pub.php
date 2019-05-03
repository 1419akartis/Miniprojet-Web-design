<?php 
  $listpub = selectMedicPub();  
?>
<div class="row same-height-row">
                
                <div class="col-lg-3 col-md-6">
                  <div class="box same-height">
                    <h3>Medicament que vous pouvez aimer</h3>
                  </div>
                </div>
                <?php
                  while($donnee = mysqli_fetch_assoc($listpub))
                  {
                ?>
                <div class="col-lg-3 col-md-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.php"><img src="../assets/img/product2.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.php"><img src="../assets/img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.php" class="invisible"><img src="../assets/img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><?php echo $donnee['nom'];?></h3>
                      <p class="price"><?php echo $donnee['prix'];?></p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <?php
                  }
                ?>
                <!-- <div class="col-lg-3 col-md-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.php"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.php"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.php" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-lg-3 col-md-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.php"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.php"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.php" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                </div> -->
              </div>