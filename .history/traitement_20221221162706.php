<?php
 
 session_start();

//check do the person logged in
if($_SESSION['user']==NULL){
    //haven't log in
 
}else{
    //Logged in
  header('location:train/view/hello.phtml  ');
}



try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }
