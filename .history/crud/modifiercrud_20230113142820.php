<?php

session_start();
if (!isset($_SESSION['user'])) {
  header('Location:view/connection.phtml');
}
$id = $_GET['iduser'];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = "SELECT * FROM user WHERE id = $id ";
$sqlstmt = $db->prepare($sql);
$sqlstmt->execute();
$userid = $sqlstmt->fetch();
$user = $userid['id'];
var_dump(sql)
if (isset($_POST['modification'])) {
  if (isset($_SESSION['user']['name'])) {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $change = $db->prepare(" UPDATE  user SET name = :name,role=:role WHERE id = $id");
    $change->execute(
      array(
        ':name' => $name,
        'role' => $role,
      )
    );
  }
  session_destroy();
  header('location:./view/connection.phtml');
  exit();

}
var_dump($user);
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
          <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>" ;>
          <label for="role" class="form-label"><strong>Rôle</strong></label>
          <input type="text" class="form-control" name="role" value="<?php echo $user['role'] ?>" ;>
          <div class="envoyer mt-3">
            <button type="submit" class="btn btn-success" name="mofification">Enregistrer les modification
            </button>
          </div>
      </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </body>

  </html>