<?php
  session_start(); 
  $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
  // S'il n'y a pas de session alors on ne va pas sur cette page
  if(!isset($_SESSION['user']['id'])){ 
    header('Location: connection.php'); 
    exit; 
  }
  // On récupère les informations de l'utilisateur connecté
  $afficher_profil = $DB->query("SELECT * 
    FROM utilisateur 
    WHERE id = ?", 
  array($_SESSION['id']));
  
  $afficher_profil = $afficher_profil->fetch(); 
?>