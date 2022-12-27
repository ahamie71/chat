<?php
include('view/nav.phtml');
 
if (isset($_POST['valider'])) {


    if (isset($_POST['name']) && isset($_POST['password'])) {

        $name = $_POST['name'];

        $password = $_POST['password'];

    }
      try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
      } catch (Exception $e) {
      
      }


$req = $db->prepare("INSERT INTO messages (name,password) VALUES (:name,:password)");
$req->execute(
    array(
        ':name' => $content,
        ':password' => $_SESSION['user']['id'],
        ':createdAt' => $createdAt->format('Y-m-d H:i:s'),

        )
);


header('location:./view/welcome.phtml');



    }

    ?>