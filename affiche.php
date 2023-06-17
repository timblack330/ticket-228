<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche <?php echo $_GET['id_affiche'];
     ?></title>
</head>
<style>
img{
    max-width: 800px;
    height: auto;
}

body{
            
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.9), rgba(0,106,77,0.9)), url("background.jpg");
            background-attachment:fixed;
            background-size: cover;
         }
         a{
            color:rgba(0,106,77,1);
            text-decoration:none;
         }
         .button {
  display: inline-block;
  padding: 3px;
 
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: rgba(0,106,77,0.9);
  border: none;
  border-radius: 5px;
  box-shadow: 0 2px #999;
}

.button:hover {background-color: #5aa899;
color: #fff;}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(2px);
}

button {
  display: inline-block;
  padding: 3px;
  
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: rgba(0,106,77,0.9);
  border: none;
  border-radius: 5px;
  box-shadow: 0 2px #999;
}

button:hover {background-color: #5aa899;
color: #fff;}

button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(2px);
}

</style>
<body>
    <h1>Affiche <?php echo $_GET['id_affiche'];
     ?></h1>
     
     <form>
<input type = "button" value = "Retour"  onclick = "history.back()">
</form>
    <img src="affiches/<?php 
    echo $_GET['id_affiche'];
    
    ?>"/>
</body>
</html>