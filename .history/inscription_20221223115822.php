<?php
include('view/nav.phtml');
 
if (isset($_POST['valider'])) {


    if (isset($_POST['name']) && isset($_POST['password'])) {
  
      $name = $_POST['name'];
  
      $password = $_POST['password'];
  
  
      $error = "";
  
      try {
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
      } catch (Exception $e) {
      
      }
