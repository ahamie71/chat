<?php


if (isset($_POST['register'])) {


    if (isset($_POST['name']) && isset($_POST['password'])) {

        $name = $_POST['name'];

        $password = $_POST['password'];

    }
    try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {

    }

    $name = $_POST['name'];
    $req= "SELECT * FROM user WHERE name= '$name'";
    



    $req = $db->prepare("INSERT INTO user (name,password) VALUES (:name,:password)");
    $req->execute(
        array(
            ':name' => $name,
            ':password' => $password,
        )
    );
   
    header('location:./view/connection.phtml');

}else{
    echo "tata";
     include('view/nav.phtml');
     include('view/inscription.phtml');
}
 

?>