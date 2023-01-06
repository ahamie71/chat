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
    <https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css>
    
    <title>modfier mon message </title>
</head>
<body>
<label for="content" class="form-label">content</label>
<input type="text" class="form-control"  aria-describedby="emailHelp">
<button type="submit" class="btn btn-primary">Envoyer</button>

</body>
</html>

