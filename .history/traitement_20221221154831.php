<?php


try {
      $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
    }


    if(isset($_POST['submit'])) {
        // Variables
        $user_id = $_POST['user_id'];
        $content = $_POST['content'];
        