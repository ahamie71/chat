<?php

        try {
            $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
        }


 $sql = "SELECT * FROM messages ";

var_dump($sql);


    ?>