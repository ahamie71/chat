<?php
 session_start();

session_destroy();
header('location: connection.php');
exit();


?>