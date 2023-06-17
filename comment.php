<?php 
session_start();

include("connexionbd.php");
$Object = new DateTime();  
$date_commentaire= $Object->format("d-m-Y h:i:s a"); 
    $id=$_SESSION['id'];
    $id_utilisateur=htmlspecialchars($_SESSION['id']);
    $commentaire=htmlspecialchars($_POST['commentaire']);
    $id_evenement=htmlspecialchars($_GET['id_evenement']);
      if(!empty($commentaire)){
      $ins2 =("INSERT INTO commentaires (id_utilisateur,id_evenement,contenu,date_commentaire) VALUES ('$id_utilisateur','$id_evenement','$commentaire','$date_commentaire')");
      $pdo->exec($ins2);}

    header("location:evenement.php?id_evenement=$id_evenement")

?>