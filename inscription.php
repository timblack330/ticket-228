<!--<?/*php
   session_start();
   @$nom=htmlspecialchars(str_replace("'","¬",$_POST["nom"]));
   @$prenom=htmlspecialchars(str_replace("'","¬",$_POST["prenom"]));
   @$numero=htmlspecialchars($_POST["numero"]);
   @$pass=htmlspecialchars(str_replace("'","¬",$_POST["pass"]));
   @$id=htmlspecialchars($prenom.$numero);
   @$org=$_POST["org"];
   @$repass=htmlspecialchars($_POST["repass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Nom laissé vide!";
      elseif(empty($prenom)) $erreur="Prénom laissé vide!";
      elseif(empty($numero)) $erreur="Numero laissé vide!";
      elseif(!preg_match('/^[0-9]{8}\z/',$numero)) $erreur="Numero invalide!";
      elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
      elseif($pass!=$repass) $erreur="Mots de passe non identiques!";
      else{
         include("connexionbd.php");
         $sel=$pdo->prepare("select id from utilisateurs where numero=? limit 1");
         $sel->execute(array($numero));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="numero existe déjà!";
         else{
            $ins=$pdo->prepare("insert into utilisateurs(id,nom,prenom,numero,org,pass) values(?,?,?,?,?,?)");
            if($ins->execute(array($id,$nom,$prenom,$numero,$org,md5($pass))))
               header("location:login.php");
         }   
      }
   }
*/?>-->
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/bootstrap.css">
      <script type="js/bootstrap.js"></script>
   </head>
   <body>
   <div class="logo"><img src="logo.png"></div>
      <h1>Inscription</h1>
      <div class="form">
      <div class="erreur"><?php/* echo $erreur*/ ?></div>

      <form name="fo" method="post" action="">
        <div>
           <div>
  <div class="row">
    <div class="col">
      <a class="button"  href=" index.php">Acceuil</a></div>
    </div>
    <div class="col">
      <a class="button"  href="login.php">Se connecter</a>
    </div>
  </div></div>
         <input type="text" name="nom" placeholder="Nom" <!--value="<?php/* echo $nom*/?>-->" /><br />
         <input type="text" name="prenom" placeholder="Prénom" <!--value="<?php/* echo $prenom*/?>-->" /><br />
         <input type="text" name="numero" placeholder="numero" value="<?php /*echo $numero*/?>" /><br />
         <p>Etes vous un organisateur d'evenements?</p>
         <label for="oui">Oui</label>
         <input type="radio" name="org"  value="oui" id="oui" />
         <label for="non">Non</label>
         <input type="radio" name="org"  value="non" id="non" checked/><br />
         <input type="password" name="pass" placeholder="Mot de passe" /><br />
         <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
         <input class="button" type="submit" name="valider" value="S'authentifier" />
</div>
        
      </form>
      <form>
         
</form></div>
      
   </body>
</html>
