<?php
if (isset($_POST['submit'])) {

    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
        $role='user';
        if ($password === $password2) {
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
}