<?php
session_start();

$messageid= $_GET['messageid'];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$del =  $sql = "SELECT * FROM  messages WHERE user_id ='.$user;
$recup = $db->prepare($del);
$recup->execute();

// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($messageid) && $messageid <> $_SESSION['user']['id']){
 

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