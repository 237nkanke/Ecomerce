<?php

if (isset($_POST["submit"])) {
 $name = $_POST["name"];
 $userId = $_POST["userId"];
 $email = $_POST["email"];
 $contact = $_POST["contact"];
 $password = $_POST["password"];
 $passwordrepeat = $_POST["passwordrepeat"];

 require_once'dbh.inc.php';
 require_once'functions.inc.php';

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
   header("location: ../sign_in.php?error=errorpasswordnotmatch");
   exit();
 }
// if (uidExixts($conn,$userId !== false) {
 // header("location: ../sign_in.php?error=usernametaken");
 //   exit();
 //}

createUser($conn, $name, $email, $userId, $password, $contact);

}
else{
    header("location: ../sign_in.php");
    exit();
}