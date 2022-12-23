<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }

$sql = "SELECT u.name,m.content,m.createdAt,m.user_id
        FROM messages m 
        JOIN user u ON m.user_id= u.id";
   

        $messageStatement = $db->prepare($sql);

        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();

       

        foreach($messages as $message){

            echo "<tr>";
            echo "<td>" . $message['name']. "</td></br>
                   <td>" . $message['content'] . "</td></br>
                   <td>" . $message['createdAt'] . "</td></br>";
                   
            echo "</tr>";
        }

       
    
?>