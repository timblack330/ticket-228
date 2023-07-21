
<?php
   session_start();
   //if($_SESSION["autoriser"]!="oui"){
     // header("location:login.php");
      //exit();
   //}
   //if($_SESSION['org']=='non'){
     // header('location:session2.php');
   //}
   if(date("H")<18)
      $bienvenue="Bonjour ".
      @$_SESSION["prenomNom"].
      " Bienvenue dans votre espace personnel";
   else
      $bienvenue="Bonsoir ".
      @$_SESSION["prenomNom"].
      " Bienvenue dans votre espace personnel";

      /*include("connexionbd.php");
        
      $reponse = $pdo->query("Select * from evenements where valide='oui'");
      if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
         $recherche=htmlspecialchars($_GET['recherche']);
         $reponse = $pdo->query('Select * from evenements where valide="oui" and nom like "%'.$recherche.'%"  ');
         if($reponse->rowCount()==0){
            $reponse=$pdo->query('Select * from evenements where valide="oui" and CONCAT(nom,description_evenement) like "%'.$recherche.'%"  ');
            if($reponse->rowCount()==0){
               $reponse=$pdo->query('Select * from evenements where valide="oui" and CONCAT(nom,date_debut) like "%'.$recherche.'%"  ');
               if($reponse->rowCount()==0){
                  $reponse=$pdo->query('Select * from evenements where valide="oui" and CONCAT(nom,heure_debut) like "%'.$recherche.'%"  ');
                  if($reponse->rowCount()==0){
                     $reponse=$pdo->query('Select * from evenements where valide="oui" and CONCAT(nom,prix) like "%'.$recherche.'%"  ');
                  }
               }
            }
         }
    echo "<div class='actions'><a class='button' href='index.php'>Retour</a>
    
    </div>";  }
      
      $donnees = $reponse->fetchAll();*/
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>

        <body>
        <script src="jquery-3.5.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Debut -->

<!-- Navbar debut-->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="Index.php">
          <img src="logo4.png" width="300" height="80" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">S'inscrire</a>
        </li>
      </ul>
      <!--       <div class="d-flex">
                <ul>
                    <li><span class="social-icon social-facebook"><i class="fa fa-facebook"></i></span></li>
                    <li><span class="social-icon social-google"><i class="fa fa-google"></i></span></li>
                    <li><span class="social-icon social-linkedin"><i class="fa fa-linkedin"></i></span></li>
                    <li><span class="social-icon social-instagram"><i class="fa fa-instagram"></i></span></li>
                    <li><span class="social-icon social-twitter"><i class="fa fa-twitter"></i></span></li>
                </ul>
            </div> -->
</nav>

<!-- background debut 
<div class="bg">
  <img class="bg-img" src="Images\back_img.jpg" alt="">
</div> -->
<!-- biblio debut -->

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="container">
     <div class="description">
       <h1>Ticket+</h1>
       <p>Acheter plus qu'un ticket</p>
       <div class="input-group">
          <input type="search" class="form-control rounded" placeholder="Trouver un évènement" aria-label="Search"
           aria-describedby="search-addon" />
         <button type="button" class="btn btn-outline-primary">Valider</button>
       </div>
     </div>
   </div>
</div>
</main>
<!-- biblio fin -->
<!-- Navbar fin-->
<!-- Carousel debut-->
<div class="row justify-content-center">
   <div class="col-xl-6 text-center">
      <h1 class="text-success">Les meilleurs evenements de Lome </h1>
<div id="moncarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#moncarousel" data-slide-to="0" class="active"></li>
    <li data-target="#moncarousel" data-slide-to="1"></li>
    <li data-target="#moncarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/affiches/event1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/affiches/event2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/affiches/event3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#moncarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#moncarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
</div>
<!-- Carousel fin-->
<!-- P Choisir debut-->
<h1 class="text-center text-success">Pourquoi choisir ticket+? </h1>
<div class="row">
   <div class="col-sm-4">
  <div class="card">
    <img class="card-img-top" src="/affiches/concert.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Un systeme simple et efficace</h5>
      <p class="card-text">Ticket+ est simple et facile a utiliser et vous permet de retrouver ce que vous chercher en quelques clics</p>
    </div>
 </div>
  </div>
  <div class="col-sm-4">
  <div class="card">
    <img class="card-img-top" src="/affiches/fest.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Trouver des evenements qui vous conviennent</h5>
      <p class="card-text">Nous vous permettons de trouver une grande variete d'evenenments selons vos preferences</p>
    </div>
 </div>
  </div>
  <div class="col-sm-4">
  <div class="card">
    <img class="card-img-top" src="/affiches/happy.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Toujours a jour</h5>
      <p class="card-text">Nos catalogies sony regulierement mis a jour pour vous trouver les evenements les plus recents</p>
    </div>
 </div>
  </div>
</div>
<!-- P choisir fin-->
<!-- footer debut-->
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Informations</h6>
                <p><u><a class="condition" href="conditiong.php">Conditions Legales</a></u></p>
                <p><u><a class="info" href="infog.php">Informations Generales</a></u></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <h6 class="text-uppercase font-weight-bold">Contact</h6>
            <p>Lome, TOGO
            <br/>christ124587@live.fr
            <br/>+228 90 00 29 18
            <br/>+228 92 36 69 24</p>
        </div>
    </div>
    <div class="footer-copyright text-center">© 2023 Copyright: Ticket+.tg</div>
</footer>
<!-- footer fin-->
        
    </body>
    
</html>
