<?php
$id = $_GET["id"];

// si l'id du l'utilisateur qui a ecrit le message est égale au celui  du user 

if($message['user_id'] == $_SESSION['user']['id']) {
    echo $message['user_id'];   
    echo $_SESSION['user']['id']; 
   
}


   

