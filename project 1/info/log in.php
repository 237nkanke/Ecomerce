<!doctype html>
<html lang="en">
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"  href="../css/creat.css">
    <title> E-COMMERCE COMMMAND </title>
  </head>
  <body>
    <header>
        <h1><b>LOG IN<b></h1>
    </header>
    <form action="include/login.inc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label> full Name:</label><br />
        <input type="text" class="form-control" name="name" placeholder="username/Email....." >
        </div>
        <div class="form-group">
            <label>Password</label><br />
            <input type="password" class="form-control" name="password"  placeholder="enter password" required >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">LOG IN</button>
        </form>
   </body>
</html>

   