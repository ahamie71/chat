<?php
session_start();

$message= $_GET['id'];
// si l'id du l'utilisateur qui a ecrit le message est different du user alors degage
if(isset($message) && ($message) <> $_SESSION['user']['id']){

}
var_dump($message);
die();



;
if ($deletstmt) {
    header("Location:view/chat.phtml");
}