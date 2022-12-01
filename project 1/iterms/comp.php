<?php
    require_once"data1.php"
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet"  href="../css/phone.css">
<body>
<h1><b>computers shop<b></h1>
<p>
    <a href="creat1.php" class="btn btn-success">creat new product</a>
</p>

<form>
<div class="input-group nb-3">
    <input type="text" class="form-control" placeholder="search for ur prod" name="search"  value="<?php echo $search ?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">search</button>
    </div>
</div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">title</th>
      <th scope="col">price</th>
      <th scope="col">creat date</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
            <?php foreach($product as $i => $product) {?>
        </tr>
            <th space="row"><?php echo $i+1 ?></th>
            <td>
            <img src="<?php echo $product['image'] ?>" class="orange" />
            </td>
            <td><?php echo $product['title']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['create_date']?></td>
            <td>
            <a href="update1.php?id=<?php echo $product['id']?> type="button" class="btn btn-sm btn-outline-primary">edit</a>
            <form style="display: inline-block" method="post" action="delete1.php">
              <input type="hidden" name="id" value="<?php echo $product['id']?>">
              <button  type="submit" class="btn btn-sm btn-outline-danger">delete</button>
            </form>
            <a href="../info/sign_in.php" class="btn btn-sm btn-success">COMMAND</a>
            </td>
        </tr>
        <?php } ?>
  
    </tbody>
</table>
</body>
<?php 
  include_once"../footer.php"
  ?>