<?php
 
 session_start();

 

//check do the person logged in
if($_SESSION['user']==NULL){
    //haven't log in
    echo "You haven't log in";
}else{
    //Logged in
    echo "Successfully log in!";
}



try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }
