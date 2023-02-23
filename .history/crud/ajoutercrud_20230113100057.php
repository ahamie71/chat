<?php
  if (isset($_POST['sublm'])) {

    if (isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role= $_POST['role'];
?>