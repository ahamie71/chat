<?php
session_start();

$message= $_GET->get('user_id');
// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($messagege && $message <> $_SESSION['user']['id']){


}


var_dump($message);
die();



$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}