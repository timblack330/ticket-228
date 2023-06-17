
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
<html>
   <head>
<link rel="stylesheet" href="css/bootstrap.css">
<script type="js/bootstrap.js"></script>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css"/>
   </head>
   <body >
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
       <a class="navbar-brand" href="#">
        <img src="228-TICKET.png" width="180" height="30" class="d-inline-block align-top" alt="">
       </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
       <div class="navbar-nav">
        <form class="form-inline">
         <li class="nav-item nav-link px-3">
            <input type="search" name="recherche" placeholder="Rechercher un évènement" />
            <input type="submit" value="valider" class="button" /></form>
        </form>
        </li>
         <li class="nav-item nav-link px-3">
            <a>
             <?php 
                if (empty($_SESSION["autoriser"])){
                 echo("<form action='login.php'>
                   <button type='submit'>Se connecter</button>
                 </form><br>");}
              ?>
             </a>
         </li>
         <li class="nav-item nav-link px-3">
             <a>
             <?php 
              if (empty($_SESSION["autoriser"])){
               echo("<form action='inscription.php'>
                 <button type='submit'>S'inscrire</button>
               </form>");}
   
              ?>
      
             </a>
      </li>
    </div>
  </div>
</nav>
<div id="welcome">
      <h2><?php echo $bienvenue?></h2></div>

      
      <div class="actions">
         <br>
         <br>
         <!-- Write your comments here
         <form method="$_GET">
         <input type="search" name="recherche" placeholder="Rechercher un évènement" />
         <input type="submit" value="valider" class="button" /></form>
         -->
         <div class="container">
  
         <div class="container">
  <a>
         <?php 
   if (isset($_SESSION["autoriser"])){
      if($_SESSION["autoriser"]=="oui"){
         echo("<form action='deconnexion.php'>
         <button type='submit'>Se déconnecter</button>
       </form><br>");
       echo("<form action='mes_reservations.php'>
       <button type='submit'>Mes reservations</button>
     </form><br>");}
   }
   if (isset($_SESSION["org"])){
      if($_SESSION["org"]=="oui"){
         echo("<form action='creation_event.php'>
         <button type='submit'>Créer un évènement</button>
       </form>");}
      }
   ?>
</a>
      <br></div>

      <?php  
      
      
      
   
      /*foreach ($donnees as  $values) {

         $nom=str_replace("¬","'",$values['nom']);
         if($values['adulte']=="oui"){$limite="Interdit aux moins de 18 ans";}
         elseif($values['adulte']=="non"){$limite="Ouvert à tous";}
         
         echo"<div class='card'><br><table id='table1'>"; 
          echo "<tr><td><span>" .$nom . "</span> par :".$values['createur'] . " ".$limite."</td></tr>";
          echo '<tr><td><a href="evenement.php?id_evenement='.$values['id'].'"><div class="affiche"><img src="affiches/'.$values["id_affiche"].'"/></div></a></td></tr>';
          
          
          echo "<td>Du " . $values['date_debut'] . " au " . $values['date_fin'] . " entre " . $values['heure_debut'] . " et ". $values['heure_fin'] . "</td>";
          echo '<tr><td>Entrée :' . htmlspecialchars($values['prix']) . "FCFA <a class='button' href='reserver.php?id_evenement=" .$values['id'] . "'>Reserver une place</a></td></tr>";
          echo "<tr><td><a class='button' href='".htmlspecialchars($values['localisation'])."'target='_blank'>Localisation</a>  <a class='button' href='evenement.php?id_evenement=" .htmlspecialchars($values['id']) . "'>Plus...</a>
          </td></tr>";
          echo "</tr>";
          echo "</div></table>";
      }

      if(count($donnees)==0){
         echo "<div class='msg'>Aucun Resultat<br>
         <form>
 <input class='button' type = 'button' value = 'Retour'  onclick = 'history.back()'>
 </form>
         </div>" ;
       }*/
      

      ?>
<script type="text/javascript">
    function hidewelcome() {
      document.getElementById("welcome").style.visibility = "hidden";
    }
    setTimeout("hidewelcome()", 10000); // aprés 10 sec
    
   </script>

   </body>
</html>