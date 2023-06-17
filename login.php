<!--<?php/*
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
   }*/
?>-->
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.css">
      <script type="js/bootstrap.js"></script>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css" />
   </head>
   <body onLoad="document.fo.numero.focus()">

   <div class="logo"><img src="logo.png"></div>
      
      <br/>
      <h1>Authentification</h1> </br>
      <div class="form">
      <div class="erreur"><?php/* echo $erreur ?></div>
      <form name="fo" method="post" action="">
          <div>
  <div class="row">
    <div class="col">
      <button onclick="window.location.href = 'inscription.php';">S'inscrire</button>
    </div>
    <div class="col">
      <button onclick="window.location.href = 'index.php';">Acceuil</button>
    </div>
    <div class="col">
      <button onclick="window.location.href = 'login_admin.php';">Admin</button>
    </div>
  </div>
         <input type="text" name="numero" placeholder="Numero" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="submit" name="valider" value="S'authentifier" class="button" />
         <input type = "button" value = "Retour"  onclick = "history.back()" class="button"/>
        
</div>
      </form>
      <form>

</form></div> <br>

   </body>
</html>