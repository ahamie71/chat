<?php
  if(isset($_POST['submit'])) {

    if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role= $_POST['role'];
