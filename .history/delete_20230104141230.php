<?php
session_start();

$messageid= $_GET['id'];
// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($messageid) && $messageid <> $_SESSION['user']['id']){
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $del = " SELECT FROM messages WHERE  = " . $messageid;
    $recup = $db->prepare($del);
    $recup->execute();

}

var_dump($recup);
die();


$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}