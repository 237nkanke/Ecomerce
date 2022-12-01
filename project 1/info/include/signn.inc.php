<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=e-commerce', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 require_once'function.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $userId = $_POST["userId"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    if (enptyInputSignup($name, $email, $userId, $password, $contact, $passwordrepeat) !== false) {
        header("location: ../sign_in.php?error=emptyinput");
        exit();
      }
      if (invalidUid($userId) !== false) {
         header("location: ../sign_in.php?error=invaliduserId");
         exit();
      }
      if (invalidEmail($email) !== false) {
         header("location: ../sign_in.php?error=invalidemail");
         exit();
      }
      if (passwordMatch($password, $passwordrepeat) !== false) {
        header("location: ../sign_in.php?error=errorpassword");
        exit();
      }

     // if (uidExixts($userId) !== false) {
      //  header("location: ../sign_in.php?error=usernametaken");
       //  exit();
      //}
      
     
                $statement = $pdo->prepare("INSERT INTO users(usersName, usersUId, usersEmail, userscontact, userspassword)
                VALUE (:name, :userId, :email, :contact ,:password)");

                $statement->bindValue(':name', $name);
                $statement->bindValue(':userId',  $userId);
                $statement->bindValue(':email',$email );
                $statement->bindValue(':contact', $contact);
                $statement->bindValue(':password', $hashedpassword);
                $statement->execute();
                header("location: ../sign_in.php?error=none");
}
 