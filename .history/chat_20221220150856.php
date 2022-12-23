<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }


        $sql = "SELECT * FROM `messages`";

        $messageStatement = $db->prepare($sql);

        $messageStatement->execute();

        $messages = $messageStatement->fetchAll();

        
        include("view/hello.phtml");

        foreach($messages as $message){

            echo "<tr>";
            echo "<td>" . $message['userid'] . "</td>
                   <td>" . $message['content'] . "</td>
                   <td>" . $message['createdAt'] . "</td>";
                   
            echo "</tr>";
        }

    

    
?>