<?php/*




include('phpqrcode/qrlib.php'); //On inclut la librairie au projet
      $lien=$_GET['id_reservation']; // Vous pouvez modifier le lien selon vos besoins
      QRcode::png($lien, 'qrcode-ticket'.'.png'); // On crée notre QR Code

    */  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="js/bootstrap.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ticket</title>
</head>
<body><div class="form2">
<img class="affiche" src="qrcode-ticket.png"/>
<input class="button" type = "button" value = "Retour"  onclick = "history.back()"></form>
</div>
</body>
</html>
<form>


