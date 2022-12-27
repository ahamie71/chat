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


    $name= $_POST['name'];
    $stmt = $bd->prepare("SELECT * FROM user WHERE  name = '$name'");
    $stmt->execute([$username]); 
    $user = $stmt->fetch();
    if ($user) {
        // le nom d'utilisateur existe déjà
    } else {
        // le nom d'utilisateur n'existe pas
    } 
    ?>



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