<?php
 
 session_start();

//check do the person logged in
if($_SESSION['user']==NULL){
    header('location:connection.php');
 
}else{
    //Logged in
  header('location:./view/hello.phtml');
}



try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }
