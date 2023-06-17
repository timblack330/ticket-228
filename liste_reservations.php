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
   <div class="actions">
<a class="button" type = "button" href="evenement.php?id_evenement=<?php echo $_GET['id_evenement'] ?>">Retour</a> 
<form method="$_GET" action=""><input type="search" name="recherche" placeholder="Rechercher" />
<input type="submit" value="valider" class="button" />
<input type="hidden" name="id_evenement" value="<?php echo $_GET['id_evenement']?>" />         
</form><br></div>
   
         <?php  
      include("connexionbd.php");
        
      $reponse = $pdo->query("Select * from reservations where id_evenement='"
      .$_GET['id_evenement']."'and statut='dispo'");
      $reponse2=$pdo->prepare("Select prix from evenements where id='".$_GET['id_evenement']."'");
      $reponse2->execute();
      $prix=$reponse2->fetchColumn();
      
      if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
        $recherche=htmlspecialchars($_GET['recherche']);
        $reponse = $pdo->query("Select * from reservations where id_evenement='"
      .$_GET['id_evenement']."' and id_reservation like '%".$recherche."%'  ");}
      $donnees = $reponse->fetchAll();
      $nbr=$reponse->rowCount();
      $revenu=$nbr*$prix;
      
      echo"<table><caption>".$nbr." Reservations|Revenu: ".$revenu." FCFA</caption>";
      echo "<th>ID</th><th>Date reservation</th><th>Evenement</th><th>Type</th><th>Statut</th><th>Actions</th>";
      foreach ($donnees as  $values) {
          echo "<tr>";
          echo "<td>" . $values['id_reservation'] . "</td>";
          echo "<td>" . $values['date_reservation'] . "</td>";
          echo "<td>" . $values['nom_evenement'] . "</td>";
          echo "<td>" . $values['type_reservation'] . "</td>";
          echo "<td>" . $values['statut'] . "</td>";
          echo "<td><a class='button' href='controle.php?id_reservation=" 
          . $values['id_reservation'] . "&id_evenement=".$_GET['id_evenement']."'>Valider</a></li>
                    
              
              </td>";


          echo "</tr>";
      }
      echo "</table>";
      if(count($donnees)==0){
         echo "<div class='form'><h2>Aucune reservation</h2></div>";
       }

      ?>
     
   
   </body>
</html>