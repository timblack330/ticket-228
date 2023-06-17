<?php
   session_start();
   
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   @$nom=htmlspecialchars(str_replace("'","¬",$_POST["nom"]));
   @$createur=htmlspecialchars($_SESSION["id"]);
   @$id=$_SESSION["id"].$nom;
   @$affiche=$_FILES["file"];
   @$id_affiche=htmlspecialchars(str_replace("'","¬",$id.$_FILES["file"]["name"]));
   @$tmp_affiche=htmlspecialchars($_FILES["file"]["tmp_name"]);
   @$nom_affiche=htmlspecialchars($_FILES["file"]["name"]);
   
   @$taille_affiche=$_FILES["file"]["size"];
   @$tabExtension = explode('.', $nom_affiche);
   @$type_affiche = strtolower(end($tabExtension));
   @$erreur_affiche=$_FILES["file"]["error"];
   @$nom_final=$id_affiche;
   $extensions = ['jpg', 'png', 'jpeg'];
   $taille_max=10000000;
   
   @$adulte=$_POST["adulte"];
   @$description_evenement=htmlspecialchars($_POST["description"]);
   @$date_debut=$_POST["date_debut"];
   @$date_fin=$_POST["date_fin"];
   @$heure_debut=$_POST["heure_debut"];
   @$heure_fin=$_POST["heure_fin"];
   @$localisation=htmlspecialchars($_POST["localisation"]);
   @$prix=htmlspecialchars($_POST["prix"]);
   @$nbr_stand=htmlspecialchars($_POST["nbr_stand"]);
   @$prix_stand=htmlspecialchars($_POST["prix_stand"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Nom laissé vide!";
      elseif(empty($description_evenement)) $erreur="Description laissée vide";
      elseif(empty($affiche)) $erreur="Affiche non uploadée!";
      elseif(empty($date_debut)) $erreur="Date de debut non définie!";
      elseif(empty($date_fin)) $erreur="Date de fin non définie!";
      elseif(empty($heure_debut)) $erreur="Heure de debut non définie!";
      elseif(empty($heure_fin)) $erreur="Heure de fin non définie!";
      elseif(empty($localisation)) $erreur="localisation non définie!";
      elseif(empty($prix)) $erreur="Prix non défini!";
      elseif($taille_affiche>=$taille_max) $erreur="fichier trop lourd!";
      elseif(!in_array($type_affiche,$extensions)) $erreur="L'affiche doit etre une image(png,jpg,jpeg)";
      else{
             move_uploaded_file($tmp_affiche,'affiches/'.$nom_final);
             include("connexionbd.php");
             $ins2 =("INSERT INTO affiches (id_affiche,nom_affiche,taille_affiche,type_affiche) VALUES ('$id_affiche','$nom_final','$taille_affiche','$type_affiche')");
             $pdo->exec($ins2);


      $ins=("INSERT INTO evenements(nom,createur,id,description_evenement,adulte,date_debut,date_fin,heure_debut,heure_fin,localisation,prix,id_affiche,prix_stand,max_stand) values('$nom','$createur','$id','$description_evenement','$adulte','$date_debut','$date_fin','$heure_debut','$heure_fin','$localisation','$prix','$id_affiche','$prix_stand','$nbr_stand')");
      $pdo->exec($ins);
      $_SESSION['autoriser']="oui";
      header("location: index.php");
      } 
            
        
      }

      
         
         
     
      
   
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
    
      
      <link rel="stylesheet" href="style.css" />
   </head>
   <body>
   <div class="logo"><img src="logo.png"></div>
      <h1>Créer un évenement</h1>
      <div class="form2">
      <div class="erreur"><?php echo $erreur ?></div>
      <form name="fo" method="post" action="" enctype="multipart/form-data">
         <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
         <input type="textarea" name="description" placeholder="Faites une brève description de votre evenement." value="<?php echo $description_evenement?>" /><br />
         <input type="text" name="createur" value="créé par <?php echo $createur?>" disabled/><br />
         <p>Cet evenement est il reserve aux adultes?</p>
         <label for="oui">Oui</label>
         <input type="radio" name="adulte"  value="oui" id="oui" />
         <label for="non">Non</label>
         <input type="radio" name="adulte"  value="non" id="non" checked/><br />
         <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
         <label for="file">Affiche</label>
         <input type="file" name="file" id="file" accept="image/*"  onchange="previewImage();"  >
         <br />
         
         
         <label for="date_debut">Date debut</label>

<input type="date" name="date_debut" id="date_debut" min="today()" value="<?php echo $date_debut?>"
       >
         <br />
         <label for="date_fin">Date fin</label>

<input type="date" name="date_fin" id="date_fin" value="<?php echo $date_fin?>"
       >
         <br />
 
    
    <label for="heure_debut">Heure de debut</label>
         <input type="time" name="heure_debut" id="heure_debut" value="<?php echo $heure_debut?>"/><br />
         <label for="heure_debut">Heure de fin</label>
         <input type="time" name="heure_fin" id="heure_fin" value="<?php echo $heure_fin?>" /><br />
         <label for="localisation">Localisation(lien)</label>
         <input type="text" name="localisation" placeholder="localisation(sous forme de lien)" value="<?php echo $localisation?>" id="localisation"/><br />
         <label for="prix">Prix d'entrée en FCFA</label>
         <input type="int" name="prix" placeholder="ex: 2000" id="prix" value="<?php echo $prix?>" /><br />
         <label for="nbr_stand">Nombre de stands</label>
         <input type="int" name="nbr_stand" placeholder="ex: 20" id="nbr_stand" value="<?php echo $nbr_stand?>" /><br />
         <label for="nbr_stand">Prix du stand</label>
         <input type="int" name="prix_stand" placeholder="ex: 2000" id="prix_stand" value="<?php echo $prix_stand?>" /><br />
         <input class="button"type="submit" name="valider" value="Soumettre" />
         
      </form>
<script>
    function fonction() {
     document.getElementById("file").click();}
   
    function previewImage() {
        var file = document.getElementById("file").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("preview").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }

       
    }

    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("date_debut").setAttribute("min", today);
document.getElementById("date_fin").setAttribute("min", today);
</script>
      </div>
<div class="actions">
<img id="preview" ><br />
<form>
<a class="button" href=" index.php">Retour</a>
</form></div>
      
 

   </body>
</html>