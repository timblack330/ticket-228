<?php
   session_start();
   if($_SESSION["autoriser2"]!="oui"){
      header("location:login_admin.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue admin ".
      $_SESSION["id_admin"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue admin ".
      $_SESSION["id_admin"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html>
   <head>
   <link rel="stylesheet" href="style.css" />
   <style>
        
         table {
border: medium solid #000000;
}
td, th {
border: thin solid #6495ed;}
</style>
      
   </head>
   <body onLoad="document.fo.numero.focus()">
   <div class="logo"><img src="logo.png"></div>
     <div id="welcome"> <h2><?php echo $bienvenue?></h2></div>
     <button onclick="window.location.href = 'deconnexion.php';">Se deconnecter</button><button onclick="window.location.href = 'admin.php';">Soumissions</button><button onclick="window.location.href = 'admin2.php';">Evenements validés</button><button onclick="window.location.href = 'admin3.php';">Commentaires</button><button onclick="window.location.href = 'admin4.php';">Utilisateurs</button><form method="$_GET">
         <input type="search" name="recherche" placeholder="Rechercher" />
         <input type="submit" value="valider" class="button" /><br>
      <?php  
      include("connexionbd.php");
        
      $reponse = $pdo->query("Select * from evenements where valide!='oui'");
      if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
         $recherche=htmlspecialchars($_GET['recherche']);
         $reponse = $pdo->query('Select * from evenements where valide!="oui" and nom like "%'.$recherche.'%"  ');
         if($reponse->rowCount()==0){
            $reponse=$pdo->query('Select * from evenements where valide!="oui" and CONCAT(nom,description_evenement) like "%'.$recherche.'%"  ');
            if($reponse->rowCount()==0){
               $reponse=$pdo->query('Select * from evenements where valide!="oui" and CONCAT(nom,date_debut) like "%'.$recherche.'%"  ');
               if($reponse->rowCount()==0){
                  $reponse=$pdo->query('Select * from evenements where valide!="oui" and CONCAT(nom,heure_debut) like "%'.$recherche.'%"  ');
                  if($reponse->rowCount()==0){
                     $reponse=$pdo->query('Select * from evenements where valide!="oui" and CONCAT(nom,prix) like "%'.$recherche.'%"  ');
                  }
               }
            }
         }
      }
      $donnees = $reponse->fetchAll();
      $nbr=$reponse->rowCount();
      
      echo"<table><caption>".$nbr." Soumissions</caption>";
      echo "<th>Nom</th><th>Createur</th><th>ID</th><th>Description</th>
      <th>Adulte?</th><th>Date debut</th><th>Date fin</th><th>Heure Debut</th>
      <th>Heure fin</th><th>Localisation</th><th>Prix</th><th>Affiche</th><th>Actions</th>";
      
      foreach ($donnees as  $values) {
          echo "<tr>";
          echo "<td>" . $values['nom'] . "</td>";
          echo "<td>" . $values['createur'] . "</td>";
          echo "<td>" . $values['id'] . "</td>";
          echo "<td>" . $values['description_evenement'] . "</td>";
          echo "<td>" . $values['adulte'] . "</td>";
          echo "<td>" . $values['date_debut'] . "</td>";
          echo "<td>" . $values['date_fin'] . "</td>";
          echo "<td>" . $values['heure_debut'] . "</td>";
          echo "<td>" . $values['heure_fin'] . "</td>";
          echo "<td><a class='button' href='" . $values['localisation'] . "'>Localisation</a></td>";
          echo "<td>" . $values['prix'] . "</td>";
          echo "<td><a class='button' href='affiche.php?id_affiche=".$values['id_affiche']."'>Voir</a></td>";
          echo "<td><ol>
                      <li><a class='button' href='supprimer.php?id_evenement=" . $values['id'] .
                       "'>Supprimer</a></li>
                      <li><a class='button' href='valider.php?id_evenement=" . $values['id'] . 
                      "'>valider</a></li>
              </ol>
              </td>";


          echo "</tr>";
      }
      echo "</table>";
      if(count($donnees)==0){
         echo "<h1>Aucune nouvelle soumission</h1>";
       }

      ?>
      <script type="text/javascript">
    function hidewelcome() {
      document.getElementById("welcome").style.visibility = "hidden";
    }
    setTimeout("hidewelcome()", 10000); // aprés 10 sec
    
   </script>
   </body>
</html>