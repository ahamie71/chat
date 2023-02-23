<?php
if (isset($_POST['submit'])) {

    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        if($nbCaracter = strlen($password);
        if ($nbCaracter >= 6 && preg_match("/[a-z][0-9]/", $password)) {
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2ID);){
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
            $req = $db->prepare("INSERT INTO user (name,password,role) VALUES (:name,:password,:role)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $password,
                    ':role' => $role
                )
            );

        }

    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="role">Rôle</label>
    <input type="text" name="role" id="role">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <button name= "submit">Enregistrer</button>
</form>

</body>
</html>