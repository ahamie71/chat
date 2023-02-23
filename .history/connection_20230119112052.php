<?php
session_start();
if (isset($_POST['valider'])) {

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }
    $sql = "SELECT * FROM  user WHERE name = '$name'";
    $userStatement = $db->prepare($sql);
    $userStatement->execute();
    $user = $userStatement->fetch();
    // if ($user != false) {
   
    if ($user) {
      $pass = $user['password'];
      if (password_verify($password, $pass)) {
        $_SESSION['user'] = $user;
        header("location:chat.php");
        exit();
      } else {
        
        $






        // incrementer ma varibale loginAttempts
        header("location:view/connection.phtml?fault=1");
        exit();
      }
    }
  }

  
}


 



