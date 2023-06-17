<?php
   session_start();
   if(isset($_GET['redirect'])){
      header("location:login_reserver.php");
   }
   @$numero=htmlspecialchars($_POST["numero"]);
   @$pass=md5(($_POST["pass"]));
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexionbd.php");
      $sel=$pdo->prepare("select * from utilisateurs where numero=? and pass=? limit 1");
      $sel->execute(array($numero,$pass));
      $tab=$sel->fetchAll();
      $sel2=$pdo->prepare("select org from utilisateurs where numero=? and pass=?");
      $sel2->execute(array($numero,$pass));
      $org=$sel2->fetch();
      $sel3=$pdo->prepare("select id from utilisateurs where numero=? and pass=?");
      $sel3->execute(array($numero,$pass));
      $_SESSION['id']=$sel3->fetchColumn();
     @ $_SESSION['org']=$org[0];
      if(count($tab)>0 ){
         $_SESSION["prenomNom"]=ucfirst(strtoupper($tab[0]["nom"]));
         $_SESSION["autoriser"]="oui";
         header("location: index.php");
      }
      else
         $erreur="Mauvais numero ou mot de passe!";
   }

   
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css" />
   </head>
   <body onLoad="document.fo.numero.focus()">
   <div class="logo"><img src="logo.png"></div>
      <h1>Authentification</h1><div class="actions"> <button onclick="window.location.href = 'inscription.php';">S'inscrire</button><br><br> <button onclick="window.location.href = 'admin.php';">Admin</button></div>
      <div class="form">
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="numero" placeholder="Numero" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" class="button" />
      </form>
      <form>
<input type = "button" value = "Retour"  onclick = "history.back()" class="button"/>
</form></div>
   </body>
</html>