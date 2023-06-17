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
      <meta charset="utf-8" />
      <style>
        
         table {
border: medium solid #000000;
}
td, th {
border: thin solid #6495ed;}



      </style>
      <link rel="stylesheet" href="style.css" />
   </head>
   <body onLoad="document.fo.numero.focus()">
   <div class="logo"><img src="logo.png"></div>
    <div id="welcome">  <h2><?php echo $bienvenue?></h2></div>
   <form>
<input class="button" type = "button" value = "Retour"  onclick = "history.back()"> </form> <button onclick="window.location.href = 'deconnexion.php';">Se deconnecter</button> <button onclick="window.location.href = 'admin.php';">Soumissions</button> <button onclick="window.location.href = 'admin2.php';">Evenements validés</button> <button onclick="window.location.href = 'admin3.php';">Commentaires</button><button onclick="window.location.href = 'admin4.php';">Utilisateurs</button><form method="$_GET">
         <input type="search" name="recherche" placeholder="Rechercher" />
         <input type="submit" value="valider" class="button" /><br>
   
         <?php  
      include("connexionbd.php");
        
      $reponse = $pdo->query("Select * from commentaires");
      if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
         $recherche=htmlspecialchars($_GET['recherche']);
         $reponse = $pdo->query('Select * from commentaires where contenu like "%'.$recherche.'%"  ');
         if($reponse->rowCount()==0){
            $reponse=$pdo->query('Select * from commentaires where CONCAT(contenu,id_evenement) like "%'.$recherche.'%"  ');
            if($reponse->rowCount()==0){
               $reponse=$pdo->query('Select * from commentaires where CONCAT(contenu,id_utilisateur) like "%'.$recherche.'%"');
               if($reponse->rowCount()==0){
                  $reponse=$pdo->query('Select * from commentaires where CONCAT(contenu,date_commentaire) like "%'.$recherche.'%"  ');
                  
               }
            }
         }
      }
      $donnees = $reponse->fetchAll();
      $nbr=$reponse->rowCount();

      
      echo"<table><caption>".$nbr." Commentaires</caption>";
      echo "<th>ID</th><th>Utilisateur</th><th>Evenement</th><th>Contenu</th><th>Date</th><th>Actions</th>";
      foreach ($donnees as  $values) {
          echo "<tr>";
          echo "<td>" . $values['id_commentaire'] . "</td>";
          echo "<td>" . $values['id_utilisateur'] . "</td>";
          echo "<td>" . $values['id_evenement'] . "</td>";
          echo "<td>" . $values['contenu'] . "</td>";
          echo "<td>" . $values['date_commentaire'] . "</td>";
          echo "<td><a class='button' href='supprimer.php?id_commentaire=" . $values['id_commentaire'] . "'>
          Supprimer</a></li>
                    
              
              </td>";


          echo "</tr>";
      }
      echo "</table>";
      if(count($donnees)==0){
         echo "<h2>Aucun commentaire</h2>";
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