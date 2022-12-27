<?php
include('view/nav.phtml');
 
if (isset($_POST['valider'])) {


    if (isset($_POST['name']) && isset($_POST['password'])) {

        $name = $_POST['name'];

        $password = $_POST['password'];

    }
      try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
      } catch (Exception $e) {
      
      }

      $createdAt = new DateTime();
$user_id = $_SESSION['user']['id'];
$content = $_POST['content'];

$req = $db->prepare("INSERT INTO messages (content,user_id,createdAt) VALUES (:content,:user_id,:createdAt)");
$req->execute(
    array(
        ':content' => $content,
        ':user_id' => $_SESSION['user']['id'],
        ':createdAt' => $createdAt->format('Y-m-d H:i:s'),

        )
);


header('location:./view/welcome.phtml');

?>

    }

    ?>