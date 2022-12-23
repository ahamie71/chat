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

        foreach($messages as $messageStatement){

            echo "<tr>";
            echo "<td>".$R['userid']."</td>
                   <td>".$R['content']."</td>
                   <td>".$R['createdAt']."</td>;
                  
                  
                   
            echo "</tr>";
        }

    

    
?>