<?php
session_start();
if(isset($_GET['messageId']) && isset($_SESSION['user']['id'])){
    
    $message= $_GET['messageId'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $modifstmt->$db->prepare($message);
    $modifstmt->excute();
    $msg= $

    
    

}