<?php
$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}
// si l'id du l'utilisateur qui a ecrit le message est égale au celui  du user 

if ($message['id_user'] == $_SESSION['user']['id']){

    header("Location:view/chat.phtml");
}
   
var_dump($message['id_user']);
