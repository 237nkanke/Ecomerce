<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id = $_POST['id'] ?? null;

if(!$id){
    header('location: comp.php');

    exit;
}
$statement = $pdo->prepare('DELETE FROM product WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('location: comp.php');