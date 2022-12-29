<?php
$id=$_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$ = " DELETE FROM messages WHERE id = '.$id.'";
$deletstmt= $db->prepare($sup);
$deletstmt->execute();
