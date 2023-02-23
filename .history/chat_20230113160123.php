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
 foreach ($messages as $message): ?>
    <div class="container">
      <div class="card mt-3">
        <div class="card-header d-flex justify-content-between p-3">
          <p class="fw-bold mb-0">
            <?php echo $message['name'] ?>
          </p>
          <p class="text-muted small mb-2"><i class="fa-solid fa-clock"></i><?php echo $message['createdAt'] ?></p>
          <?php
          if (isset($_SESSION['user']['id']) && ($_SESSION['user']['id']) == $message['user_id']) {
            echo ' <a href="./delete.php?messageid=' . $message['id'] . '"class="btn btn-danger  ">Delete</a> ';
            echo ' <a href="./edit.php?messageId=' . $message['id'] . '"class="btn btn-success">Edit</a> ';
          }
          ?>
        </div>
        <div class="card-body ">
          <p class="mb-0">
            <?php echo $message['content'] ?>
          </p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="container">
    <form action="./sending.php" method="POST">
      <div class="flex-grow-0 py-3 px-4 border-top">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Type your message" name='content'>
          <button class="btn btn-primary" name="submit">Send</button>
        </div>
      </div>
    </form>
  </div>

