<?php
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id= user_id";
$checkstatement = $db->prepare($req);
$checkstatement->execute();
$user = $checkstatement->fetch();




?>