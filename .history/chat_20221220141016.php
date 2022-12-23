<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }
          

        $sql = "SELECT content FROM messages ":
          
        var_dump($sql);

         $messageStatement = $db->prepare($sql);
       
        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();


    ?>