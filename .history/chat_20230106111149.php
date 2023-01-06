

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
$limit = 3;
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


if (isset($_GET['default'])) {
    switch ($_GET['default']) {
        case 1:
            $message = "Impossible de supprimer ce message";

    }
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no Sorry </strong>' . $message . '<button type ="button" class ="close">
    <span aria-hidden="true">&times;</span></button>
    </div>';
}





   

?>