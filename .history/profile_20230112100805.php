<?php
  session_start(); 
  $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
  // S'il n'y a pas de session alors on ne va pas sur cette page
  if(!isset($_SESSION['user']['id'])){ 
    header('Location: view/connection.phtml'); 
    exit; 
  }
  // On récupère les informations de l'utilisateur connecté
  
?>