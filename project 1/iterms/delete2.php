<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id = $_POST['id'] ?? null;

if(!$id){
    header('location: phone.php');

    exit;
}
$statement = $pdo->prepare('DELETE FROM product3 WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: phone.php');