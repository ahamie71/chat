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
      $loginAttempts = $user['LoginAttempts'];
      $blocked = $user['Blocked'];
      $email = $user['Email'];
      $id

      if ($loginAttempts >= 3) {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        $update = $db->prepare(" UPDATE  user SET Blocked = :Blocked' WHERE id =$id");
        $update->execute(
          array(
              ':Blocked' => $blocked,
        )
        );

        header('location:view/connection.phtml?fault=2');
        exit();

      }






      if (password_verify($password, $pass)) {
        $_SESSION['user'] = $user;
        header("location:chat.php");
        exit();
      } else {

        $loginAttempts = $loginAttempts + 1;
        $id = $user['id'];
        // je changer dansd la table user et setr la nouvelle valeur
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        $update = $db->prepare(" UPDATE  user SET LoginAttempts =:LoginAttempts  WHERE id =$id");
        $update->execute(
          array(
            ':LoginAttempts' => $loginAttempts

          )
        );






      }



      // incrementer ma varibale loginAttempts
      header("location:view/connection.phtml?fault=1");
      exit();
    }
  }
}