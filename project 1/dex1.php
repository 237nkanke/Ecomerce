<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet"  href="css/dex1.css">
    <title> E-COMMERCE </title>
  </head>
  <body>
    <div class="cup">
     <header>
          <h1><b>NKANKE E-SHOP</b></h1>
      </header>
     <div id="nkanke">
       <p><h2><b>good market.</b></h2></p>
     </div>
     <nav>
        <div class="book2">
         <ul>
              <li><a  class="book" href="#">SHOP</a></li>
              <li><a class="book" href="info/sign_in.php">SIGN IN</a></li>
              <li><a class="book" href="info/log in.php">LOG IN</a></li>
              <li><a class="book" href="#">SETTINGS</a></li>
          </ul>
       </div>
      </nav>
    </div>
    <div id="container">
        <img class="element" src="image/me5.jpg" alt="shop">
        <img class="element" src="image/me13.jpeg" alt="shop">
        <img class="element" src="image/me14.jpg" alt="shop">
        <img class="element" src="image/me2.jpg" alt="shop">
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th >IMAGE</th>
      <th >NAME</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><img src="image/me100.jpg" width="80"></td>
      <td>Telephones</td>
      <td><a href="iterms/phone.php" type="button" class="btn btn-sm btn-outline-primary">shop</a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><img src="image/me70.jpg" width="80"></td>
      <td>Computers</td>
      <td><a href="iterms/comp.php" type="button" class="btn btn-sm btn-outline-primary">shop</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><img src="image/me800.jpg" width="80"></td>
      <td>Dresses</td>
      <td><a href="iterms/dress.php" type="button" class="btn btn-sm btn-outline-primary">shop</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><img src="image/me800.jpg" width="80"></td>
      <td>Books</td>
      <td><a href="iterms/books.php" type="button" class="btn btn-sm btn-outline-primary">shop</a></td>
    </tr>
  </tbody>
</table>
  </body>
  <?php 
  include_once"footer.php"
  ?>
</html>