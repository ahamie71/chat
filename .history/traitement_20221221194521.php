<?php
session_start();
//check do the person logged in
if ($_SESSION['user'] == NULL) {
    header('location:view/connection.phtml');
    exit();

}
 
  

$content = $_POST['content'];

try {
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {

}

if(isset($_POST['content'])){

    $content = $_POST['content'];
  

  
   
  
    $sql="INSERT INTO messages (content) VALUES('".$content."',)";
  
   
  }
    ?>