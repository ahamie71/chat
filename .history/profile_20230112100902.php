<?php
  session_start(); 

  if(!isset($_SESSION['user']['id'])){ 
    header('Location: view/connection.phtml'); 
    exit; 
  }

  $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');

  $pr = "SELECT * FROM  user WHERE name = '$name'";
  $userStatement = $db->prepare($sql);
  $userStatement->execute();
  $user = $userStatement->fetch();

?>