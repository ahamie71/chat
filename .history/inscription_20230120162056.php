<?php

if (isset($_POST['register'])) {

    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        
    }
    $nbCaracter = strlen($password);
    if ($nbCaracter >= 6 && preg_match("/[a-z][0-9]/", $password)) {
        $pass = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        $role='user';
        if ($password === $password2) && $_ {
            $req = $db->prepare("INSERT INTO user (name,password,role) VALUES (:name,:password,:role)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $pass,
                    ':role' => $role
                )
            );
            header('location:view/inscription.phtml?success=1');
            exit();
        } else {
            header("Location:view/inscription.phtml?error=3");
            
        }
        $req = "SELECT * FROM user WHERE name=  '$name'";
        $checkstatement = $db->prepare($req);
        $checkstatement->execute();
        $user = $checkstatement->fetch();
        if($user) {
            header('Location:inscription.phtml?error=1');
            exit();
        } else {
            header('Location:view/inscription.phtml');
            exit();
        }
    }
} else {
    include('view/nav.phtml');
    include('view/inscription.phtml');
}
?>