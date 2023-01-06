<?php
session_start();
if(isset($_GET['messageId']) && isset($_SESSION['user']['id'])){
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $message= $_GET['messageId'];

    
    

}