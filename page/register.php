  <!DOCTYPE html>
<html>
  <head>
    <?php include("../include/headPage.php") ;?>
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->



      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.php" class="navbar-brand home"><img src="../assets/img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="../assets/img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.php" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
      </div>
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Inscription / Connexion</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h1>Inscription</h1>
                <p>Veuillez - vous inscrire ici!</p>
                <hr>
                <form action="traitinscrire.php" method="post">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input name="nom" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="mdp" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> S'incrire</button>
                  </div>
                </form>
                <span>
                  <h4 style="color : #81bb28;text-align: center">
                  <?php
                      $testinc = isset($_GET['testinsc'])   ? $_GET['testinsc']   : "";

                        echo $testinc;

                   ?>
                  </h4>

                </span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h1>Login</h1>
                <p>Veuillez - vous connectez ici!</p>
                <hr>
                <form action="traitement/traitement.php" method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Connexion</button>
                  </div>
                </form>
                <span>
                  <h4 style="color : red;text-align: center">
                  <?php
                      $testlog = isset($_GET['testlog'])   ? $_GET['testlog']   : "";

                        echo $testlog;

                   ?>
                  </h4>

                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("../include/footerPage.php") ;?>
  </body>
</html>
