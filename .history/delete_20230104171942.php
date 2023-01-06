<?php
session_start();
//on veut supprimer un message du coup un user pourra supprimerson message mais pas celui des autres users
//mais l'utlilisateur pourra etre malin en rentrant dans l'url l'id d'un messsage d'un autre user et pourra le supprimer 
// pour cela nous allons interdire cet user de le faire 
// on doit verifier l'id du l'author de message si il 'est different de user connecté 
// dans le cas ou  l'id de l'author du message est <> que celui de la personne connecté l'utilisateur ne pourra pas le supprimer , 
// dans un autre cas si l'id de l'author du message =id personne connecté donc on valide la suppression de son propre messsage
// donc pour recuperer l'id du message 
// on a recuper avec la """""variable superbeglobale""""" GET qui permet de recuper le paramètre rentré dans l'url , pour cela on veut l'id du message alors 
// declare dans l'url messageid= $.message[id] 
$messageid= $_GET['messageid'];


// donc la on a recupérer l'id du message, il nous reste a recupere l'author du message  pour les comparer .
// nous allons se connecter a la base de donnés , en executant un requête qui va selectionner l'attribut  
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sel = "SELECT * FROM messages WHERE id = $messageid";
    $selectstmt = $db->prepare($sel);
    $selectstmt->execute();
    $recup = $selectstmt->fetch();

    if(isset($messageid) && $messageid <> $recup){

    echo "HELLO";
    }
else{

    $id = $_GET["id"];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $sql = " DELETE FROM messages WHERE id = " . $id;
    $deletstmt = $db->prepare($sql);
    $deletstmt->execute();
    if ($deletstmt) {
        header("Location:view/chat.phtml");
    }

    
