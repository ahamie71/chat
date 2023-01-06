<?php
//on veut supprimer un message du coup un user pourra supprimerson message mais pas celui des autres users
//mais l'utlilisateur pourra etre malin en rentrant dans l'url l'id d'un messsage d'un autre user et pourra le supprimer 
// pour cela nous allons interdire cet user de 


    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sql = " DELETE FROM messages WHERE id = " . $id;
    $deletstmt = $db->prepare($sql);
    $deletstmt->execute();
    if ($deletstmt) {
        header("Location:view/chat.phtml");
    }