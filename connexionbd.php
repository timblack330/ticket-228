<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=228-ticket","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>