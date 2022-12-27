<?php


if (isset($_POST['register'])) {


    if (isset($_POST['name'])  && isset($_POST['password'])) {

        $name = htmlspecialchars($_POST['name']);

        $password = htmlspecialchars($_POST['password']);

         $password2=htmlspecialchars($_POST['password2']);

        $warning= "";
        

    }

       

    
    try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {

    }


    $name = $_POST['name'];

    $req = "SELECT * FROM user WHERE name=  '$name'";
    $checkstatement = $db->prepare($req);
    $checkstatement->execute();
    $user = $checkstatement->fetch();
   
   
    if ($user) {
          
        echo '<div class="alle'

          header("Location:inscription.php");
        exit();

    } else {

        if ($password === $password2) {

            $req = $db->prepare("INSERT INTO user (name,password) VALUES (:name,:password)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $password,
                )
            );

            header('location:./view/connection.phtml');


        }

        else{

            ";
        }
    }

} else {

    include('view/nav.phtml');
    include('view/inscription.phtml');
}





?>