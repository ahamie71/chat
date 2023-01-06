<?php
// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($message['user_id']) && $message['user_id'] <>$_)

$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}