<?php 

include("connexionbd.php");
$id=htmlspecialchars($_GET['id_reservation']);
$id_evenement=htmlspecialchars($_GET['id_evenement']);
$sql=("UPDATE reservations
SET statut = 'utilisé'
WHERE id_reservation='$id'");

$pdo->exec($sql);

header("location:liste_reservations.php?id_evenement=".$id_evenement);

?>