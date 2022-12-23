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
$createdAt = '00:00:00';
$user_id = $_SESSION['user']['id'];
$content = $_POST['content'];

$content = 'test';
$req = $db->prepare("INSERT INTO messages (content) VALUES (:content)");
$req->execute(
    array(
        ':content' => $content
        )
);

?>