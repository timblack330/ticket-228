<?php
   session_start();
   
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
   <div class="actions"><form>
<input class="button" type = "button" value = "Retour"  onclick = "history.back()"> </form> </div>
        
   
         <?php  
      include("connexionbd.php");
        
      $reponse = $pdo->query("Select * from reservations where id_utilisateur='".$_SESSION['id']."'");
      
      $donnees = $reponse->fetchAll();
      
      echo"<table><caption>Mes reservations</caption>";
      echo "<th>Evenement</th><th>Date reservation</th><th>Type</th><th>Statut</th><th>Actions</th>";
      foreach ($donnees as  $values) {
          echo "<tr>";
          echo "<td>" . $values['nom_evenement'] . "</td>";
          echo "<td>" . $values['date_reservation'] . "</td>";
          echo "<td>" . $values['type_reservation'] . "</td>";
          echo "<td>" . $values['statut'] . "</td>";
          echo "<td><a class='button' href='telecharger.php?id_reservation=" . $values['id_reservation'] . "'>Generer mon qr code</a></li>
                    
              
              </td>";


          echo "</tr>";
      }
      echo "</table>";
      if(count($donnees)==0){
         echo "<h2>Aucune reservation</h2>";
       }

      ?>
     
   
   </body>
</html>