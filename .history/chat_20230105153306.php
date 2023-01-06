<?php
session_start();
include("nav.phtml");
if (!isset($_SESSION['user'])) {
    header('Location:view/connection.phtml');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link<link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>
</head>

<body>
    <h1>Bienvenue
        <?php echo $_SESSION['user']['name'] ?>
    </h1>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {
}
$req = "SELECT COUNT(*) AS total FROM messages ";
$nbmessagestmt = $db->prepare($req);
$nbmessagestmt->execute();
$result = $nbmessagestmt->fetchColumn();
// le nombre de message par page
$limit = 3;
//  la fonction ceil est pour arrondir 
$nbpage = ceil($result / $limit);
if (isset($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
if ($currentPage > $nbpage) {
    $currentPage = $nbpage;
}
$offset = ($currentPage - 1) * $limit;
$sql = "SELECT u.name ,m.id,m.content,m.createdAt,m.user_id
        FROM messages m 
        JOIN user u ON m.user_id= u.id
        ORDER BY m.createdAt DESC
        LIMIT $limit OFFSET $offset";
$messageStatement = $db->prepare($sql);
$messageStatement->execute();
$messages = $messageStatement->fetchAll();


if (isset($_GET['default'])) {
 switch ($_GET['default']) {
   case 1:
     $message = "Impossible de supprimer ce message";
 }
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no Sorry </strong>' . $message . '<button type ="button" class ="close">
    <span aria-hidden="true">&times;</span></button>
    </div>';
}

foreach ($messages as $message) {
    $string =
  
        '                 <div class="container m-5">' .
        '    <strong><p> ' . $message['name'] . '</p></strong>' .
        '                     <p >' . $message['content'] . '</p>' .
        
        ' <span class="time-right">' . $message['createdAt'] . '</span>'.
        '</div>';
        
    if (isset($_SESSION['user']['id']) && ($_SESSION['user']['id']) == $message['user_id']) {
        echo ' <a href="./../delete.php?messageid='. $message['id'] .'">Delete</a> ';

    }
    if (isset($_SESSION['user']['id']) && ($_SESSION['user']['id']) == $message['user_id']) {
        echo ' <a href="./../edit.php?messageId='.message[">Edit</a> ';

    }


    
    
    

    echo $string;
}
?>