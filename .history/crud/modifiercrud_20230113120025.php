<?php

   session_start(); 

   if(!isset($_SESSION['user']['id'])){ 
     header('Location: view/connection.phtml'); 
     exit; 
   }
     id $_GET['id'];
   $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    
    $sql = "SELECT * FROM  user WHERE id = ".$_SESSION['user']['id']."";
    $userstmt= $db->prepare($sql);
    $userstmt->execute();
    $edit = $userstmt->fetchAll();
    var_dump($_SESSION['user']['id']);
    die();    
    

?>

<?php


 




?>