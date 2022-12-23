<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }


$sql =  'SELECT * FROM messages WHERE is_enabled = TRUE';
          
        var_dump($sql);

         $messageStatement = $db->prepare($sql);
       
        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();


    ?>