<?php

session_start();

if (isset($_SESSION["user"]['id']) && isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] != 'admin') {
    header('location:./../view/connection.phtml');
    exit; // important
}


if (isset($_POST['submit'])) {

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $loginAttempts= $_POST['LoginAttempts'];

  }
  $nbCaracter = strlen($password);
  if ($nbCaracter >= 6 && preg_match("/[a-z][0-9]/", $password)) {
    $pass = password_hash($_POST['password'], PASSWORD_ARGON2ID);
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    $req = $db->prepare("INSERT INTO user (name,password,role) VALUES (:name,:password,:role,Login)");
    $req->execute(
      array(
        ':name' => $name,
        ':password' => $pass,
        ':role' => $role,
        ':LoginAttempts' => $loginAttempts

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div id="form">
  <div class="container mt-1">
    <form method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Enter a name" name="name">

      </div>
      <div class="form-group">
        <label for="role">Rôle</label>
        <select  class="form-select" aria-label="Default select example"
          id="exampleInputPassword1" placeholder="admin or user" name='role'>
          <option selected>Open this select menu</option>
          <option value="admin">admin</option>
          <option value="user">user</option>
        
        </select>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
      </div>

      <input  name="LoginAttempts" type="hidden" value="LoginAttempts">

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
</body>


</html>

<style>
#form{

width: 900px;

height: auto;

position: absolute;

left: 50%;

top: 50%;

transform: translate(-50%, -50%);

-webkit-transform: translate(-50%, -50%);

}

</style>