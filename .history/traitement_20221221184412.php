<?php

session_start();

//check do the person logged in
if ($_SESSION['user'] == NULL) {
    header('location:view/connection.phtml');
    exit();

}



try {
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {
}

if (isset($_POST['submit'])) {

    $content = $_POST['content'];


    $sql = "INSERT INTO 'messages'('content') VALUES ('$content')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->execute();


}