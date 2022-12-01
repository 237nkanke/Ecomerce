<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;

if(!$id){
    header('location: phone.php');

    exit;
}

$statement = $pdo->prepare('SELECT * FROM product3 WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
       
        if(!$title){
                $errors[] = 'product title is required';
        }
        if(!$price){
                $errors[] = 'product price is required';
        }

        if (!is_dir('images')){
                mkdir('images');
            }

        if (empty($errors)){

                $image = $_FILES['image'] ?? null;
                $imagePath  = $product['image'];

                
                 if ($image && $image['tmp_name']){

                    if ($product['image']){
                        unlink($product['image']);
                    }
    

                        $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                        mkdir(dirname($imagePath));
                        move_uploaded_file($image['tmp_name'], $imagePath);
                 }

               
                 $statement = $pdo->prepare("UPDATE product3 SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");

                 $statement->bindValue(':title', $title);
                $statement->bindValue(':image', $imagePath);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':price', $price);
                $statement->bindValue(':id', $id);
                $statement->execute();
                header('location:phone.php');
        }
}

function randomString($n){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index ];
    }


    return $str;
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet"  href="../css/creat.css">
    <title> E-COMMERCE </title>
  </head>
  <body>

    <p>
        <a href="phone.php" class="btn btn-secondary">go back to product</a>
    </p>

    <header>
    <h1>update new product <b><?php echo $product['title']?></b> </h1>
    </header>

    <?php if (!empty($errors)): ?>
           <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
                <?php endforeach; ?>
           </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">

             <?php if($product['image']): ?>
                <img src="<?php echo $product['image'] ?>" class="man">
            <?php endif; ?>

        <div class="form-group">
            <label>poduct image</label><br />
            <input type="file"  name="image">
        </div>
         <div class="form-group">
            <label>poduct title</label>
             <input type="text" class="form-control" name="title" placeholder="enter product tilte" >
        </div>
        <div class="form-group">
            <label>poduct description</label>
            <textarea type="text" class="form-control" name="description"  placeholder="enter the description"></textarea>
        </div>
        <div class="form-group">
            <label>poduct price</label>
            <input type="number" step=".01" name="price" class="form-control"  placeholder="enter the product price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>