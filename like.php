<?php 
session_start();
include("connexionbd.php");

$id=$_SESSION['id'];
if(isset($_GET['id_evenement'],$_GET['t']) and !empty($_GET['id_evenement']) and !empty($_GET['t'])){
    
    if($_GET['t']=='like'){
    $check_like=$pdo->prepare('SELECT id from likes where id_evenement=? and id_utilisateur=?');
    $check_like->execute(array($_GET['id_evenement'],$id));
    $del_dislike2=$pdo->prepare('DELETE from dislikes where id_evenement=? and id_utilisateur=?');
        $del_dislike2->execute(array($_GET['id_evenement'],$id));
    if($check_like->rowCount()==1){
        $del_like=$pdo->prepare('DELETE from likes where id_evenement=? and id_utilisateur=?');
        $del_like->execute(array($_GET['id_evenement'],$id));   
    }
     else{   $ins=$pdo->prepare('INSERT INTO likes(id_evenement,id_utilisateur) values(?,?)');
        $ins->execute(array($_GET['id_evenement'],$id));
    }}
    elseif($_GET['t']=='dislike'){
        $check_dislike=$pdo->prepare('SELECT id from dislikes where id_evenement=? and id_utilisateur=?');
    $check_dislike->execute(array($_GET['id_evenement'],$id));
    $del_like=$pdo->prepare('DELETE from likes where id_evenement=? and id_utilisateur=?');
        $del_like->execute(array($_GET['id_evenement'],$id));
    if($check_dislike->rowCount()==1){
        
        $del_dislike=$pdo->prepare('DELETE from dislikes where id_evenement=? and id_utilisateur=?');
        $del_dislike->execute(array($_GET['id_evenement'],$id));   
    }
    else{    $ins=$pdo->prepare('INSERT INTO dislikes(id_evenement,id_utilisateur) values(?,?)');
        $ins->execute(array($_GET['id_evenement'],$id));
    }}
}
header('location:evenement.php?id_evenement='.$_GET['id_evenement'])
?>