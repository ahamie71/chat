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

     

$req = $db->prepare("INSERT INTO messages (content, createdAt,  ) VALUES (:content, :createdAt, :user_id, )");
    $req->execute(array(
           
            ));

?>