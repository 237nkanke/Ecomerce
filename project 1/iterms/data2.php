<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search']  ?? '';
if ($search){
    $statement = $pdo->prepare('SELECT * FROM product3 WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
}else{
    $statement = $pdo->prepare('SELECT * FROM product3 ORDER BY create_date DESC');
}

$statement->execute();
$product = $statement->fetchall(PDO::FETCH_ASSOC);

