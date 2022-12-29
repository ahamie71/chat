<?php
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = $_POST['id'];
$deletstmt= $db->prepare($sql);
$deletstmt->execute();
