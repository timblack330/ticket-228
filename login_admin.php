<!--<?php/*
   session_start();
   @$numero=htmlspecialchars($_POST["numero"]);
   @$pass=md5(htmlspecialchars($_POST["pass"]));
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexionbd.php");
      $sel=$pdo->prepare("select * from admin where numero=? and mdp=? limit 1");
      $sel->execute(array($numero,$pass));
      $tab=$sel->fetchAll();
     
     
      if(count($tab)>0){
        $_SESSION["prenomNom"]=ucfirst(strtoupper($tab[0]["nom"]));
         $_SESSION["autoriser2"]="oui";
         
         $sel3=$pdo->prepare("select numero from admin where numero=? and mdp=?");
         $sel3->execute(array($numero,$pass));
         $_SESSION['id_admin']=$sel3->fetchColumn();
         header("location:admin.php");
      }
      else
         $erreur="Mauvais numero ou mot de passe!";
   }*/
?>-->
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css" />
   </head>
   <body onLoad="document.fo.numero.focus()">
   <div class="logo"><img src="logo.png"></div> <br>
      <h1>Authentification Administrateur</h1><form>

</form>
<div class="form">      
<div class="erreur"><?php/* echo $erreur */?></div>
      <form name="fo" method="post" action="">
         <input type="text" name="numero" placeholder="Numero" /><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input class="button" type="submit" name="valider" value="S'authentifier" />
         <input class="button" type = "button" value = "Retour"  onclick = "history.back()">
      </form>
      </div>
   </body>
</html>