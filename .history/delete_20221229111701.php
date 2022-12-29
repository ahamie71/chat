<?php
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id= user_id";
$deletstmt= $db->prepare($sql);
$delet->execute();
$user = $checkstatement->fetch();




?>