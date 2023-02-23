<?php


session_start();

if (isset($_SESSION["user"]['id']) && isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] != 'admin') {
    header('location:connection.phtml');
    exit; // important
}