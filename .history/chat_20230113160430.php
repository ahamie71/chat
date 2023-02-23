<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
} catch (Exception $e) {
}
$req = "SELECT COUNT(*) AS total FROM messages ";
$nbmessagestmt = $db->prepare($req);
$nbmessagestmt->execute();
$result = $nbmessagestmt->fetchColumn();
// le nombre de message par page
$limit = 7;
//  la fonction ceil est pour arrondir 
$nbpage = ceil($result / $limit);
if (isset($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
if ($currentPage > $nbpage) {
    $currentPage = $nbpage;
}
$offset = ($currentPage - 1) * $limit;
$sql = "SELECT u.name ,m.id,m.content,m.createdAt,m.user_id
        FROM messages m 
        JOIN user u ON m.user_id= u.id
        ORDER BY m.createdAt DESC
        LIMIT $limit OFFSET $offset";
$messageStatement = $db->prepare($sql);
$messageStatement->execute();
$messages = $messageStatement->fetchAll();
include('/viewchat.phtml');

?>