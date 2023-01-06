<?php
session_start();

if (isset($_GET["messageid"]) && (isset($_SESSION['user']))) {
    $userid = $_SESSION['user'];
    $messageid = $_GET["messageid"];
    // donc la on a recupérer l'id du message, il nous reste a recupere l'author du message  pour les comparer .
// nous allons se connecter a la base de donnés , en executant un requête qui va selectionner l'attribut  
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sel = "SELECT * FROM messages WHERE id = $messageid";
    $selectstmt = $db->prepare($sel);
    $selectstmt->execute();
    $message = $selectstmt->fetch();
    $userId = $message['user_id'];
    ;
} else {

    header('location:view/connection.phtml');
    exit();
}

if ($userId == $_SESSION['user']['id']) {

    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sql = " DELETE FROM messages WHERE id = " . $messageid;
    $deletstmt = $db->prepare($sql);
    $deletstmt->execute();

    if ($deletstmt) {
        header("Location:view/chat.phtml");
        exit();
    }
} else {

    header('location:view/chat.phtml?default=1');
}