<?php
$supid = $_['id'];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id= '.$supid.'";
$deletstmt= $db->prepare($sql);
$deletstmt->execute();





?>