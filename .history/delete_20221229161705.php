<?php
$id=$_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
var_dump($id);
die();
$sql = " DELETE FROM messages WHERE id = 7";
$deletstmt= $db->prepare($sql);
$deletstmt->execute();
