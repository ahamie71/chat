<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }
        $content = $_POST['content'];
        $sql = "SELECT * FROM  messages WHERE content ='$content'";
        var_dump($sql);


    ?>