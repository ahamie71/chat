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

    if ($user) {
      
      $pass = $_SESSION[user]

      if (password_verify($password, $pass)) {

        header("location:view/welcome.phtml");
        exit();
      } else {
        header("location:view/connection.phtml?fault=1");
        exit();
      }
    }










  }

}








  


