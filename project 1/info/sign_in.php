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
        <h1><b>SIGN IN<b></h1>
    </header>

    <?php if (!empty($errors)): ?>
           <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
                <?php endforeach; ?>
           </div>
        <?php endif; ?>
    <form action="include/signn.inc.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label>full Name:</label><br />
             <input type="text" class="form-control" name="name" placeholder="enter your full name"  >
        </div>
        <div class="form-group">
            <label> User Name:</label><br />
            <input type="text" class="form-control" name="userId" placeholder="enter your user name" >
        </div>
        <div class="form-group">
            <label>Email:</label><br />
            <input type="emaile" class="form-control" name="email"  placeholder="enter your email address" >
        </div>
        <div class="form-group">
            <label>Contact</label><br />
            <input type="address" class="form-control" name="contact"  placeholder="enter your contact"  >
        </div>
        <div class="form-group">
            <label>Password</label><br />
            <input type="password" class="form-control" name="password"  placeholder="create password" >
        </div>
        <div class="form-group">
            <label>repeat Password</label><br />
            <input type="password" class="form-control" name="passwordrepeat"  placeholder="create password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">sign up</button>
    </form>
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p><b>Fill In All Fields!</b></p>";
        }else if($_GET["error"] == "invaliduserId"){
            echo "<p><b>Chose A Proper User Name</b></p>";
        }else if($_GET["error"] == "invalidemail"){
            echo "<p><b>Chose A Proper Email</b></p>";
        }else if($_GET["error"] == "errorpassword"){
            echo "<p><b>Password Dont Match</b></p>";
        }else if($_GET["error"] == "none"){
            echo "<p><b>YOU HAVE SIGN IN </B></p>";
        }
    }
    ?>
   </body>
</html>

   