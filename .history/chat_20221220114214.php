<?php
 
 if (isset($_POST['send'])) {


    if (isset($_POST['content']) && isset($_POST['createdAt'])) {
  
$content = $_POST['content'];

$createdAt = $_POST['createdAt'];


try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }

      
    $sql = "SELECT * FROM  messages WHERE content = '$content' AND  createdAt = '$createdAt' ";

    $messageStatement = $db->prepare($sql);

    $messageStatement->execute();

    $message = $messageStatement->fetch();

    ?>