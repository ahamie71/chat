<?php
// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if (isset($_SESSION['user']['id']) && ($_SESSION['user']['id']) == $message['user_id']) {
    echo ' <a href="./../delete.php?id=' . $message['id'] . '">x</a> ';
}
var_dump($_SESSION['user']['id']);
die();


$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}