<?php
session_start();

$messageId = $_GET['message_id'];


// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($messageId) && $messageId <> $_SESSION['user']['id']){
   

    

}
$id = $_GET["message_id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}