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
$createdAt = new DateTime();
$user_id = $_SESSION['user']['id'];
$content = $_POST['content'];

$req = $db->prepare("INSERT INTO messages (content,user_id,createdAt) VALUES (:content,:user_id,:createdAt)");
$req->execute(
    array(
        ':content' => $content,
        ':user_id' => $_SESSION['user']['id'],
        ':createdAt' => $createdAt->format('Y-m-d H:i:s'),

        )
);


   

?>