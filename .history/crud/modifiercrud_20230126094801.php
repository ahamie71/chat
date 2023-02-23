<?php

session_start();
if (!isset($_SESSION['user'])) {
  header('Location:view/connection.phtml');
}



if (isset($_SESSION["user"]['id']) && isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] != 'admin') {
    header('location:connection.phtml');
    exit; // important
}
$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = "SELECT * FROM user WHERE id = $id";
$sqlstmt = $db->prepare($sql);
$sqlstmt->execute();
$userid = $sqlstmt->fetch();
$user = $userid['id'];


if (isset($_POST['modification'])) {
  if (isset($_GET['id'])) {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $change = $db->prepare(" UPDATE  user SET name =:name , role = :role WHERE id = $id");
    $change->execute(
      array(
        ':name' => $name,
        ':role' => $role
      )
    );
    header('location:./../view/admin.phtml');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>

    <body>
      <h2 class="text-center m-3"> Modification </h2>
      <form action="" method="post">
        <div class="container">
          <label for="name" class="form-label"><strong>Name</strong></label>
          <input type="text" class="form-control" name="name" value="<?php echo $userid['name'] ?>" ;>
         
          
          <div class="envoyer mt-3">
            <button type="submit" class="btn btn-success" name="modification">Enregistrer les modification
            </button>
          </div>
      </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>

  </html>