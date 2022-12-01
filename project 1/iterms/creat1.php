<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$description = '';
$price = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $date = date('y-m-d h:i:s');

        
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
                $imagePath  = '';
                if ($image && $image['tmp_name']){
                        $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                        mkdir(dirname($imagePath));
                        move_uploaded_file($image['tmp_name'], $imagePath);
                }
                $statement = $pdo->prepare("INSERT INTO product(title, image, description, price, create_date)
                VALUE (:title, :image, :description, :price ,:date)");

                $statement->bindValue(':title', $title);
                $statement->bindValue(':image', $imagePath);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':price', $price);
                $statement->bindValue(':date', $date);
                $statement->execute();
                header('location:comp.php');
        }
}

function randomString($n)
{
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
    <header>
        <h1><b>creat new product</b></h1>
    </header>
         <?php if (!empty($errors)): ?>
           <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
                <?php endforeach; ?>
           </div>
        <?php endif; ?>

    <form action="creat1.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>poduct image</label><br />
            <input type="file"  name="image">
        </div>
         <div class="form-group">
            <label>poduct title</label>
             <input type="text" class="form-control" name="title" placeholder="enter the product title" <?php echo $title?> >
        </div>
        <div class="form-group">
            <label>poduct description</label>
            <textarea type="text" class="form-control" name="description"  placeholder="enter the description" <?php echo $title?>></textarea>
        </div>
        <div class="form-group">
            <label>poduct price</label>
            <input type="number" step=".01" name="price" class="form-control"  placeholder="enter the product price" <?php echo $title?>>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>