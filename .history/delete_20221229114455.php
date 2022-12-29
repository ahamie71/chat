<?php

$id=$_GET['user_id']; s
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id= .$id";
$deletstmt= $db->prepare($sql);
$deletstmt->execute();
$delete = $deletstmt->fetch();

var_dump($delete);


?>