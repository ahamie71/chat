<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form method="post" action="">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">email</label>
  <input type="email" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Your message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
</div>
    
<button type="submit" class="btn btn-primary" name="send">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php

if (isset($_POST['send'])) {

    if (isset($_POST['email']) && $_POST['message']) {

        $email = $_POST['email'];

        $message = $_POST['message'];



    }
    $req = $db->prepare("INSERT INTO messageAdmin (email,message) VALUES (:email,:message,)");
    $req->execute(
        array(
            ':email' => $email,
            ':message' => $message,
            
        )
    );
    

}

