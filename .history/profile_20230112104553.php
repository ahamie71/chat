<?php
  session_start(); 

  if(!isset($_SESSION['user']['id'])){ 
    header('Location: view/connection.phtml'); 
    exit; 
  }

  $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');

   $get = "SELECT * FROM  user WHERE id = ".$_SESSION['user']['id']."";
   $profilstmt= $db->prepare($get);
   $profilstmt->execute();
   $profil = $profilstmt->fetchAll();
   include('view/profile.phtml');
?>

<php