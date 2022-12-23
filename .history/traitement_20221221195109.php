<?php
session_start();
//check do the person logged in
if ($_SESSION['user'] == NULL) {
    header('location:view/connection.phtml');
    exit();

}
 
  



try {
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {

}





$sql = "INSERT INTO `messages`(`id`, `content`, `createdAt`, `user_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')";
   
  var_dump($sql);
   
  
    ?>