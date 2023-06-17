<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['id_evenement'];?></title>
</head>
<link rel="stylesheet" href="style.css" />
<body>
<div class="logo"><img src="logo.png"></div>
<?php /*include("connexionbd.php");
        session_start();

        $likes=$pdo->prepare('SELECT id from likes where id_evenement= ?');
        $likes->execute(array($_GET['id_evenement']));
        $likes=$likes->rowCount();

        $dislikes=$pdo->prepare('SELECT id from dislikes where id_evenement= ?');
        $dislikes->execute(array($_GET['id_evenement']));
        $dislikes=$dislikes->rowCount();
        
        $reponse = $pdo->query("Select * from evenements where id ='$_GET[id_evenement]'");
        $donnees = $reponse->fetch();
        $sql=$pdo->query("SELECT * FROM commentaires where id_evenement='$_GET[id_evenement]' ORDER BY date_commentaire DESC");
        $commentaires=$sql->fetchAll();
        $nbr=$sql->rowCount();
        $nom=$donnees['nom'];
        $createur=$donnees['createur'];
        $description=$donnees['description_evenement'];
        
        if ($donnees['adulte']=="oui"){$adulte="Interdit aux moins de 18 ans!";}
        elseif ($donnees['adulte']=="non"){$adulte="Ouvert à tous";}
        $date_debut0=explode("-",$donnees['date_debut']);
        $date_debut="$date_debut0[2]"."/"."$date_debut0[1]"."/"."$date_debut0[0]";
        $date_fin0=explode("-",$donnees['date_fin']);
        $date_fin="$date_fin0[2]"."/"."$date_fin0[1]"."/"."$date_fin0[0]";
        $heure_debut0=explode(":",$donnees['heure_debut']);
        $heure_debut="$heure_debut0[0]".":"."$heure_debut0[1]";
        $heure_fin0=explode(":",$donnees['heure_fin']);
        $heure_fin="$heure_fin0[0]".":"."$heure_fin0[1]";
        $localisation=$donnees['localisation'];
        $prix=$donnees['prix'];
        $prix_stand=$donnees['prix_stand'];
        $max_stand=$donnees['max_stand'];
        $id_affiche=$donnees['id_affiche'];
        $localisation=$donnees['localisation'];
        @$id_utilisateur=$_SESSION['id'];
        $id_evenement=$_GET['id_evenement']*/?>
        
    <p>
    <div class="actions">
        L'evenement <span><?php /*echo $nom */?></span> se deroulera du <?php /*echo $date_debut */ ?> au <?php /*echo $date_fin*/ ?> entre <?php /*echo $heure_debut */?> et <?php /*echo $heure_fin*/ ?> Statut: <?php/* echo $adulte;*/ ?><br>
        Entrée : <span><?php /*echo $prix */?></span>FCFA <a class="button"href="reserver.php?id_evenement=<?php /*echo $_GET['id_evenement'] */?>">Reserver un ticket</a><br><br><a class='button' href="<?php /*echo $localisation */?>" target='_blank'>Localisation</a><br><br>
        <?php /*if($max_stand>0)echo "Stand : <span> $prix_stand </span>FCFA <a class='button' href='reserver_stand.php?id_evenement=".$_GET['id_evenement']." '>Reserver un stand</a>"*/?>
        <a class="button" href=" index.php">Retour</a>
      </div><div class="form2">
    <img src="affiches/<?php echo $id_affiche; ?>"/><br>
    <?php /*echo $description; */?> <?php /*echo "<br><tr><td>".$likes."<a class='button' href='like.php?id_evenement=".$_GET['id_evenement']."&t=like'>❤</a>".
     "</td><td>".$dislikes."<a class='button' href='like.php?id_evenement=".$_GET['id_evenement']."&t=dislike'>💔</a></td></tr>"; ?><br>
    
    
<?php /*

   echo "<table id='table2'><caption>".$nbr." Commentaires</caption>";
   
   
  echo "<tbody class='comment'>";
  foreach($commentaires as $values){

    echo "<tr><td>".$values['contenu']."<sup> par ".$values['id_utilisateur']." le ".$values['date_commentaire']." </sup></td></tr>";
  }
  echo "</tbody></table>";

  */
?>
    
    
    <form action="comment.php?id_evenement=<?php echo $_GET['id_evenement'] ?>" method="POST">
    <input type="text" name=commentaire placeholder="Votre commentaire"/><input class="button" type="submit" value="envoyer">
    
    </form>
    <?php /*if($id_utilisateur==$createur){
    echo "<a class='button'href = 'liste_reservations.php?id_evenement=".$id_evenement."'>Liste reservations</a>";
  } */?>
    
   
    
   
    
    
    </p>
       </div>
</body>
</html>
