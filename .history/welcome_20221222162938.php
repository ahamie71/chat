<?php
session_start();
include("nav.phtml");
if (!isset($_SESSION['user'])) {
  header('Location:view/connection.phtml');

}

?>

<H1>Bienvenue
  <?php echo $_SESSION['user']['name'] ?>
</H1>


<?php

 
try {
  $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {
}
 
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;

$req = "SELECT COUNT(*) AS total FROM messages ";
$nbmessagestmt=$db->prepare($req);
$nbmessagestmt->execute();
$result=$nbmessagestmt->fetchColumn();

 
// le nombre de message par page 



$nbmessagesparpage = 5;
$pages 

 

$sql = "SELECT u.name,m.content,m.createdAt,m.user_id
        FROM messages m 
        JOIN user u ON m.user_id= u.id
        ORDER BY m.createdAt DESC
        LIMIT 5 OFFSET 0";

$messageStatement = $db->prepare($sql);

$messageStatement->execute();

$messages = $messageStatement->fetchAll();

foreach ($messages as $message) {


  // echo "<tr>";
  // echo "<td>" . $message['name'] . "</td></br>
  //                  <td>" . $message['content'] . "</td></br>
  //                  <td>" . $message['createdAt'] . "</td></br>";

  // echo "</tr>";



  $string =

    '                 <div class="container">' .
    '<img src="/w3images/bandmember.jpg">' .
    '                     <p> ' . $message['name'] . '</p>' .
    
    '                     <p >' . $message['content'] . '</p>' .
    ' <span class="time-right">' . $message['createdAt'] . '</span>' .
    '</div>';


    
    

  echo $string;


}



?>