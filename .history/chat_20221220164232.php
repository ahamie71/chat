<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }




$sql = "SELECT u.name,m.content,m.createdAt 
        FROM messages m 
        JOIN user u ON m.user_id= u.id";
   

        $messageStatement = $db->prepare($sql);

        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();
        
     
        
        include("view/hello.phtml");

        foreach($messages as $message){

            echo "<tr>";
            echo "<td>" . $message['user_id']. "</td></br>
                   <td>" . $message['content'] . "</td></br>
                   <td>" . $message['createdAt'] . "</td></br>";
                   
            echo "</tr>";
        }

    

    
?>