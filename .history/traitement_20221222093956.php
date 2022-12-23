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
$createdAt = new \DateTime;
$user_id= $_SESSION['user']['id'];
$content=$_POST['content'];
$req = $db->prepare("INSERT INTO messages (content,cretaedAt,user_id) VALUES (:content, :createdAt, :user_id, )");
    $req->execute(array(
            'content'=>$content,
            'createdAt'=>$createdAt,
            'user_id'=>$user_id,


            ));

?>