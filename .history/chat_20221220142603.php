<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }


         $sql = "SELECT * FROM `messages`";
          
         $messageStatement = $db->prepare($sql);
       
        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();
     
         var_dump($messages);
         
    ?>