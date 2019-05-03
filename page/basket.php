<?php 
    session_start() ;
    require('traitement/function.php');
    $id = isset($_GET['id'])   ? $_GET['id']   : null;
    $nom = isset($_GET['nom'])   ? $_GET['nom']   : null;
    $desc = isset($_GET['desc'])   ? $_GET['desc']   : null;
    $prix = isset($_GET['prix'])   ? $_GET['prix']   : null;

    if (!isset($_SESSION['panier']))
    {
      $_SESSION['panier'] = array();
    }

    $qte_article  = isset($_GET['qte_article'])  ? $_GET['qte_article']  : 1;

    if ($id == null) echo ''; // Message si pas d'acticle s�lectionn�
			else
			if (isset($_GET['ajout'])){ // Ajouter un nouvel article
			  $_SESSION['id'] = $id ;
			  $_SESSION['panier'][$id]['id']  = $id;
			  $_SESSION['panier'][$id]['nom']  = $nom;
			  $_SESSION['panier'][$id]['desc'] = $desc;
			  $_SESSION['panier'][$id]['prix']  = $prix;
        $_SESSION['panier'][$id]['qte']  = $qte_article;
        $mont = $prix * $qte_article;
        $_SESSION['panier'][$id]['mont']  = $mont;
      } 
      else if(isset($_GET['suppr']))  
			{
				unset($_SESSION['panier'][$_GET['suppr']]); // Supprimer un article du panier
      }
      else if(isset($_GET['modif']))  
      { 
        $_SESSION['panier'][$id_article]['qte'] *=$_GET['modif'] ; // Modifier la quantit� achet�e
      }
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
                  <li aria-current="page" class="breadcrumb-item active">Panier</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="GET" action="ModePayement.php">
                  <h1>Panier</h1>
                  <p class="text-muted">Vous avez <strong><?php echo count($_SESSION['panier'])?></strong> medicaments dans votre panier. </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Medicament</th>
                          <th>Nom</th>
                          <th>Description</th>
                          <th>Prix</th>
                          <th>Quantite</th>
                          <th >Total</th>
                          <th >Suppr</th>
                          <th >Modif</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $total_panier = 0;	
                          $i=0;
                        if (isset($_SESSION['panier']) && count($_SESSION['panier'])>0){
                          foreach($_SESSION['panier'] as $id=>$article_achet�){
                            // var_dump($id);
                          // On affiche chaque ligne du panier : nom, prix et quantit� modifiable + 2 boutons : modifier la qt� et supprimer l'article
                      ?>
                      <form action="#" method="GET">
                        <tr>
                          <td><a href="#"><img src="../assets/img/product1.jpg" alt="White Blouse Armani"></a></td>
                          <td><a href="#"><?php echo $article_achet�['nom']?></a></td>
                          <td><a href="#"><?php echo $article_achet�['desc']?></a></td>
                          <!-- <td ><p id="prix<?php echo $i?>"><?php echo $article_achet�['prix']?></p></td> -->
                          <td ><input id="prix<?php echo $i?>" type="text" value="<?php echo $article_achet�['prix']?>"/></td>
                          <td>
                            <input id="qte<?php echo $i?>" onkeyup="modif(<?php echo $i?>)" type="number"  value="<?php echo $article_achet�['qte']?>" class="form-control" >
                          </td>
                          <td ><a id="mont<?php echo $i?>" href="#"><?php echo $article_achet�['mont']?></a></td>
                          <td><a href="basket.php?suppr=<?php echo $article_achet�['id']?>&&id=<?php echo $article_achet�['id'];?>&&nom=<?php echo $article_achet�['nom'];?>&&desc=<?php echo $article_achet�['desc'];?>&&prix=<?php echo $article_achet�['prix'];?>"><i class="fa fa-trash-o"></i></a></td>
                          <td><a href="basket.php?modif=<?php echo $article_achet�['qte']?>"><i class="fa fa-refresh"></i></a></td>
                          <!-- <button type="submit"><i class="fa fa-refresh"></i> Update cart</button> -->
                          <?php 
                              $total_panier += $article_achet�['prix'] * $_SESSION['panier'][$id]['qte'] ;
                              $_SESSION['total_panier'] = $total_panier;
                              $remise = getRemise($_SESSION['total_panier']) ;
                              $_SESSION['remise'] = $remise;
                              $totalapresremise = $total_panier * $_SESSION['remise'];
                              $_SESSION['totalapresremise'] = $totalapresremise;
                          ?>
                        </tr>
                        </form>
                        <?php
          $i++;
			  }
			  // echo '<hr><h3>Total: ', number_format($total_panier, 2, ',', ' '), ' Fmg'; // Affiche le total du panier
			}
			else { echo '<p style="text-align:center;">Votre panier est vide</p>'; } // Message si le panier est vide
			echo "</ul>";
?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <!-- <p id="result">dfdfd</p> 
                          <input type="button" onclick="modif(1)"/> -->
                          <th colspan="5">Total</th>
                          <th colspan="2"><input type="text" id="total" value="<?php echo number_format($total_panier, 0, ',', ' ').' Ar';?>"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="index.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continuer shopping</a></div>
                    <?php 
                        if(isset($_SESSION['facture'] )){
                    ?>
                    <div class="right">
                      <button type="submit" class="btn btn-primary" disabled>Proceder au facture <i class="fa fa-chevron-right"></i></button>
                    </div>
                    <?php
                        }
                    ?>
                    <?php 
                        if(!isset($_SESSION['facture'] )){
                    ?>
                    <div class="right">
                      <a href="traitementinstdetfact.php"><button type="submit" class="btn btn-primary">Proceder au facture <i class="fa fa-chevron-right"></i></button></a>
                    </div>
                    <?php
                        }
                    ?>
                  </div>
                </form>
              </div>
              <!-- /.box-->
              <?php include("../include/pub.php") ;?>
            </div>
            <!-- /.col-lg-9-->
            
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
    <?php include("../include/footerPage.php") ;?>
  </body>
</html>