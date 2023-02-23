<?php
if (isset($_POST['submit'])) {

    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $db = new PDO('mysql:host=localhost;dbname=train;charset=utf8', 'root', 'root');
            $req = $db->prepare("INSERT INTO user (name,password,role) VALUES (:name,:password,:role)");
            $req->execute(
                array(
                    ':name' => $name,
                    ':password' => $pass,
                    ':role' => $role
                )
            );



    } 
}
?>
ht
<form method="post">
    <label for="produit">Produit</label>
    <input type="text" name="produit" id="produit">
    <label for="prix">Prix</label>
    <input type="text" name="prix" id="prix">
    <label for="nombre">Nombre</label>
    <input type="number" name="nombre" id="nombre">
    <button>Enregistrer</button>
</form>