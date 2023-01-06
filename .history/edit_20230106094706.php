<?php
session_start();
if (isset($_GET['messageId']) && isset($_SESSION['user']['id'])) {

    $id = $_GET['messageId'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $mod = "SELECT * FROM messages WHERE id = $id";
    $modifstmt = $db->prepare($mod);
    $modifstmt->execute();
    $msg = $modifstmt->fetch();
    $contenu=$msg['content'];


}

if (isset($_GET['update'])) {
    switch ($_GET['update']) {
      case 1:
        $message = "your message has been updated";
    }
       echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Ohh no Sorry </strong>' . $message . '<button type ="button" class ="close">
       <span aria-hidden="true">&times;</span></button>
       </div>';
   }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>modfier le contenu de son message</title>
</head>

<body>
    <form method="post" action="">
        <div class="container">
            <label for="content" class="form-label">content</label>
            <input type="text" class="form-control" name="content" value="<?=$msg['content']?>";>
            <div class="envoyer">
                <button type="submit" class="btn btn-primary" name="edit">Modifier</button>
            </div>
    </form>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</body>

</html>

<?php

if (isset($_POST['edit'])) {

    if (isset($_POST['content'])) {


        $content = $_POST['content'];

        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        $update = $db->prepare("UPDATE  messages SET content = :content WHERE id = $id");
        $update->execute(
            array(
                ':content' => $content,

            )

        );

        header('location:view/chat');
        exit();
    }
}