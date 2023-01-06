<?php
$id = $_GET["id"];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = " DELETE FROM messages WHERE id = " . $id;
$deletstmt = $db->prepare($sql);
$deletstmt->execute();
if ($deletstmt) {
    header("Location:view/chat.phtml");
}

if($deletstmt->$message['id_user'] <> $deletstmt->$_SESSION['user']['id_user']) {

    header("Location:delete.php?id=".$message['id']." '");
    exit();


}
