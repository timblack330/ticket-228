<?php  


session_start();
include('connexionbd.php');
$Object = new DateTime();  
$date= $Object->format("d-m-Y h:i:s a"); 
if(isset($_POST['st']) and $_POST['st']==17){
    $nom=substr($_POST['nom_evenement'],-2);
    $id=substr($_SESSION['id'],-8).substr($_POST['nom_evenement'],-2).substr($date,0,5);
    $ins =("INSERT INTO reservations (id_reservation,id_utilisateur,id_evenement,nom_evenement,date_reservation,type_reservation) VALUES ('$id','$_SESSION[id]','$_POST[id_evenement]','$_POST[nom_evenement]','$date','$_POST[type_reservation]')");
      $pdo->exec($ins);

      
      
      
      

}



header('location:evenement.php?id_evenement='.$_POST['id_evenement']);

?>