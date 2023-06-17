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
        
      $reponse = $pdo->query("Select * from utilisateurs ");
      if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
         $recherche=htmlspecialchars($_GET['recherche']);
         $reponse = $pdo->query('Select * from utilisateurs where nom like "%'.$recherche.'%"  ');
         if($reponse->rowCount()==0){
            $reponse=$pdo->query('Select * from utilisateurs where CONCAT(nom,prenom) like "%'.$recherche.'%"  ');
            if($reponse->rowCount()==0){
               $reponse=$pdo->query('Select * from utilisateurs where CONCAT(nom,id) like "%'.$recherche.'%"  ');
               if($reponse->rowCount()==0){
                  $reponse=$pdo->query('Select * from utilisateurs where CONCAT(nom,numero) like "%'.$recherche.'%"  ');
                  if($reponse->rowCount()==0){
                     $reponse=$pdo->query('Select * from utilisateurs where CONCAT(nom,org) like "%'.$recherche.'%"  ');
                  }
               }
            }
         }
      }
      $donnees = $reponse->fetchAll();
      $nbr=$reponse->rowCount();

      
      echo"<table><caption>".$nbr." Utilisateurs</caption>";
      echo "<th>Id</th><th>Nom</th><th>Prenom</th><th>Numero</th><th>Org?</th><th>Actions</th>";
      
      foreach ($donnees as  $values) {
          echo "<tr>";
          echo "<td>" . $values['id'] . "</td>";
          echo "<td>" . $values['nom'] . "</td>";
          echo "<td>" . $values['prenom'] . "</td>";
          echo "<td>" . $values['numero'] . "</td>";
          echo "<td>" . $values['org'] . "</td>";
          echo "<td><ol>
                      <li><a class='button' href='supprimer.php?id_utilisateur=" . $values['id'] .
                       "'>Supprimer</a></li>
              </ol>
              </td>";


          echo "</tr>";
      }
      echo "</table>";
      if(count($donnees)==0){
         echo "<h1>Aucun utilisateur</h1>";
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