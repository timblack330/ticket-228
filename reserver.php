<?php include("connexionbd.php");
session_start();

if (empty($_SESSION["autoriser"])){
      
  header("location:login.php?redirect=reserver");
}
        
        $reponse = $pdo->query("Select * from evenements where id ='$_GET[id_evenement]'");
        $donnees = $reponse->fetch();
        $nom=$donnees['nom'];

?>

<h1>Reserver un ticket pour <span><?php echo $nom ?></span><sup>Vous serez remboursé seulement en cas d'annulation de l'évènement</sup></h1>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Document</title>
    
</head>

<body>
<div class="logo"><img src="logo.png"></div>
<?php include("connexionbd.php");
         $sel=("select * from evenements where id='$_GET[id_evenement]'");
         $data=$pdo->query($sel);
         $data=$data->fetch();
         
         
         ?>

         <input type="hidden" id="prix"value="<?php echo $data['prix']?>">

<!--
Remplacez VOTRE_CLE_API_PUBLIQUE par la clé publique de votre compte sandbox ou live.
-->

<div class="form">
<!--
Remplacez VOTRE_CLE_API_PUBLIQUE par la clé publique de votre compte sandbox ou live.
-->
<form action="reservation.php" method="POST">
 <input type="hidden" name="field" value="test">
 <input type="hidden" name="st" value="17">
 <input type="hidden" name="nom_evenement" value="<?php echo $data['nom'] ?>">
 <input type="hidden" name="id_evenement" value="<?php echo $data['id'] ?>">
 <input type="hidden" name="type_reservation" value="ticket">
 <script
   src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
   data-public-key="pk_live_oVv84oye2sqi8aWI2Njj_Dz7"
   data-button-text="Payer 100FCFA"
   data-button-class="button-class"
   data-transaction-amount="100"
   data-transaction-description="Description de la transaction"
   data-currency-iso="XOF"
   data-button-text="Reserver mon ticket"
   data-button-class="button"
   data-widget-image="logo.png"
   data-widget-title="228-ticket"
   data-submit_form_on_failed=FALSE>
 </script>
</form>
<form>
<input class="button" type = "button" value = "Retour"  onclick = "history.back()">
</form></div>


</body>
</html>