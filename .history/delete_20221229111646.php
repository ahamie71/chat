<?php
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id= user_id";
$delet = $db->prepare($sql);
$checkstatement->execute();
$user = $checkstatement->fetch();




?>