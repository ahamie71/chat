<?php
use function CommonMark\Render\HTML;
session_start();
if(isset($_GET['messageId']) && isset($_SESSION['user']['id'])){
    
    $message= $_GET['messageId'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $mod = "SELECT * FROM messages WHERE id = $message";
    $modifstmt= $db->prepare($mod);
    $modifstmt->execute();
    $msg= $modifstmt->fetchAll(); 
    
   


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modfier mon message </title>
</head>
<body>
    
</body>
</html>

