<?php 

include("connexionbd.php");

if(isset($_GET['id_evenement'])){
    $sql=("DELETE FROM evenements
WHERE id='$_GET[id_evenement]'");
;
$pdo->exec($sql);
unlink("affiches/'$_GET[id_evenement]'");

header("location:admin.php");
}
if(isset($_GET['id_commentaire'])){
    $sql2=("DELETE FROM commentaires
WHERE id_commentaire='$_GET[id_commentaire]'");
    $pdo->exec($sql2);
header("location:admin3.php");}
if(isset($_GET['id_utilisateur'])){
    $sql3=("DELETE FROM utilisateurs
WHERE id='$_GET[id_utilisateur]'");
    $pdo->exec($sql3);
header("location:admin4.php");}



?>