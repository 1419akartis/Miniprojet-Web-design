
<?php 
        $cat= cat();
        $cat2= cat();
        $active = isset($_GET['active']) ? $_GET['active'] : 0;
         
  ?>
<header class="header mb-5">
      <div id="top">
        <div class="container">
          
        </div>
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Customer login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="customer-orders.php" method="post">
                  <div class="form-group">
                    <input id="email-modal" type="text" placeholder="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password-modal" type="password" placeholder="password" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
              </div>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.php?active=1" class="navbar-brand home"><img src="assets/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="pharmacie logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.php" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <?php if($active==0){ ?>
              <li class="nav-item"><a href="index.php?active=1" class="nav-link active">Acceuil</a></li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Categorie<b class="caret"></b></a>
              <?php } ?>
              <?php if($active==1){ ?>
              <li class="nav-item"><a href="index.php?active=1" class="nav-link active">Acceuil</a></li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Categorie<b class="caret"></b></a>
              <?php } ?>
              <?php if($active==2){ ?>
              <li class="nav-item"><a href="index.php?active=1" class="nav-link">Acceuil</a></li>
              <li class="nav-item dropdown menu-large "><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link active">Categorie<b class="caret"></b></a>
              <?php } ?>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                    <?php
                      while($donneecat = mysqli_fetch_assoc($cat)){
                    ?>
                      <div class="col-md-6 col-lg-3">
                        <h5><?php echo $donneecat['nom'];?></h5>
                        <ul class="list-unstyled mb-3">
                        <?php
                            $souscat= souscatByIdcat($donneecat['id']);
                            while($donneesouscat = mysqli_fetch_assoc($souscat)){
                          ?>
                          <li class="nav-item"><a href="page/categorie.php?idcat=<?php echo $donneecat['id'];?>&&idsouscat=<?php echo $donneesouscat['id'];?>&&active=2" class="nav-link"><?php echo $donneesouscat['nom'];?></a></li>
                        <?php
                        }
                        ?> 
                        </ul>
                      </div>
                      <?php
                        }
                      ?> 
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.php?panier=ok" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span><strong>
              <?php
                  if(!isset($_SESSION['panier'])) echo " "; 
                  else echo count($_SESSION['panier']);
              ?>
              </strong>
               Panier</span></a></div>
               <?php 
                    if(isset($_SESSION['facture'] )){
                ?>
               <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="facture.php" class="btn btn-primary navbar-btn"><span>Voir Facture</span></a></div>
               <?php
                  }
               ?>
               <a href="page/traitement/traitementdeco.php" class="nav-link"><i class="fa fa-sign-out"></i>Deconnexion</a>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto" action="pageresult.php" method="GET">
            <div class="input-group">
              <input name="designe" type="text" placeholder="Search" class="form-control">
              
            </div>
            <div class="form-group">
                    <p>Categorie</p>
                  <select name="cat" id="cat" class="form-control" onchange="showHint('souscat', this.value)" required>
                    <?php
                      while($donneecat2 = mysqli_fetch_assoc($cat2)){
                    ?>
                      <option class="form-control" value="<?php echo $donneecat2['id'];?>"><?php echo $donneecat2['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <p>Sous Categorie</p>
                  <select id="souscat" name="souscat" class="form-control" required>
                      <option></option>
                  </select>
                  </div>
                  <p>Prix min </p>
					        <input class="form-control" style="width: 100px;margin-top: 10px ;margin-left: 10px ;" name="prixmin" step="1000" min="0" max="100000" type="number" value="0"/><br>
                  <p>Prix max </p>
					        <input class="form-control" style="width: 100px;margin-top: 10px ;margin-left: 10px ;" name="prixmax" step="1000" min="0" max="100000" type="number" value="0"/><br>
                  <div class="input-group-append">
                <button class="btn btn-primary"><i class="fa fa-search"></i>Rechercher</button>
              </div>
          </form>
        </div>
      </div>
    </header>