<?php
//on veut supprimer un message du coup un user pourra supprimerson message mais pas celui des autres users
//mais l'utlilisateur pourra etre malin en rentrant dans l'url l'id d'un messsage d'un autre user et pourra le supprimer 
// pour cela nous allons interdire cet user de le faire 
// on doit verifier l'id du l'author de message si il 'est different de user connecté 
// dans le cas ou  l'id de l'author du message est <> que celui de la personne connecté l'utilisateur ne pourra pas le supprimer , 
// dans un autre cas si l'id de l'author du message =id personne connecté donc 

    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sql = " DELETE FROM messages WHERE id = " . $id;
    $deletstmt = $db->prepare($sql);
    $deletstmt->execute();
    if ($deletstmt) {
        header("Location:view/chat.phtml");
    }