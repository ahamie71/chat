<?php
session_start();
if(isset($_GET['messageId']) && isset($_SESSION['user']['id'])){
    
    $message= $_GET['messageId'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $mod = "SELECT * FROM messages WHERE id = $message";
    $modifstmt= $db->prepare($mod);
    $modifstmt->execute();
    $msg= $modifstmt->fetch();
    
    $content = $msg['content'];

   


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>modfier le contenu de son message</title>
</head>
<body>
<form method="post" action="edit.php">
<div class="container">
<label for="content" class="form-label">content</label>
<input type="text" class="form-control" >
<div class="envoyer">
<button type="submit" class="btn btn-primary">Envoyer</button>
</div>
</form>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</body>
</html>

<?php

if (isset($_POST['content']){

    
    $content=$_POST['content'];
     
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $update = $db->prepare("UPDATE   (name,password) VALUES (:name,:password)");
    $req->execute(
        array(
            ':name' => $name,
            ':password' => $pass,
        )
