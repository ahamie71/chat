<?php


session_start();

if (isset($_SESSION["user"]['id']) && isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] != 'admin') {
    header('location:connection.phtml');
    exit; // important
}

$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
$sql = "DELETE FROM `liste` WHERE `id`= $id";


