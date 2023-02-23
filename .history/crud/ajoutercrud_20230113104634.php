<?php
if (isset($_POST['submit'])) {

    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
            $req = $db->prepare("INSERT INTO user (name,password,role) VALUES (:name,:password,:role)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $pass,
                    ':role' => $role
                )
            );



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
    <label for="role"></label>
    <input type="text" name="prix" id="prix">
    <label for="nombre">Nombre</label>
    <input type="number" name="nombre" id="nombre">
    <button>Enregistrer</button>
</form>

</body>
</html>