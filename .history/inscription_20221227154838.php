<?php

if (isset($_POST['register']))
 {
    if(preg_match("#[a-z]#",$password)){

        $message2 = "chaine valide";

    } else{

        $message2 = "chaine invalide ";
    }

     
    

  if (isset($_POST['name'])  && isset($_POST['password'])) {
 $name = $_POST['name'];
 $password2=$_POST['password2'];
          
    }

    
       

    
    try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
    } catch (Exception $e) {

    }


   

    $req = "SELECT * FROM user WHERE name=  '$name'";
    $checkstatement = $db->prepare($req);
    $checkstatement->execute();
    $user = $checkstatement->fetch();
   
   
    if ($user) {

          header("Location:inscription.php?error=1");
        exit();


    } 
    
    
    else {

        if ($password === $password2) {

            $req = $db->prepare("INSERT INTO user (name,password) VALUES (:name,:password)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $password,
                )
            );
             
            header('location:inscription.php?success=1');
            exit();


        }

        else{
             
            header("Location:inscription.php?error=2");
            exit();

            ;
        }
    }

} else {

    include('view/nav.phtml');
    include('view/inscription.phtml');
}





?>