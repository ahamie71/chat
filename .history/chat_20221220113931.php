<?php


$content = $_POST['content'];

$createdAt = $_POST['createdAt'];


try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }

      
    $sql = "SELECT * FROM  message WHERE content = '$content' AND  createdAt = '$createdAt' ";

    $messageStatement = $db->prepare($sql);

    $messageStatement->execute();

    $message = $messageStatement->fetch();

    ?>