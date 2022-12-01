<?php

function enptyInputSignup($name, $email, $userId, $password, $contact, $passwordrepeat) {
   $result = null;
    if (empty($name) || empty($email) || empty($userId) || empty($contact) || empty($password) || empty($passwordrepeat)){
        $result = true;
    }
   else{
        $result = false;
   }
    return $result;
}

function invalidUid($userId) {
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userId)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = null;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordrepeat) {
    $result = null;
    if ($password !== $passwordrepeat) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


//function uidExixts($conn, $userId, $email){
 //  $sql = "SELECT * FROM users WHERE usersUId = ? OR usersEmail = ?;";
 //   $stmt = mysqli_stmt_init($conn);
 //    if (!mysqli_stmt_prepare($stmt, $sql)) {
  //      header("location: ../sign_in.php?error=stmtfailed");
  //    exit();
 ///   }

  /// mysqli_stmt_bind_param($stmt, "ss", $userId, $email );
  // mysqli_stmt_execute($stmt);

  //  $resultData = mysqli_stmt_get_result($stmt);

   // if($row = mysqli_fetch_assoc($resultData)){
   //     return $row;
   // }else{
   //     $result = false;
   //     return $result;
    //}

    //mysqli_stmt_close($stmt);
//}

function createUser($conn, $name, $email, $userId, $password, $contact) {
    $sql = "INSERT INTO users (usersName, userEmail,usersUId,userspassword,userscontact) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../sign_in.php?error=stmtfailed");
       exit();
  }

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
   
       mysqli_stmt_bind_param($stmt, "sssss",  $name, $email, $userId, $hashedpassword, $contact);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       header("location: ../sign_in.php?error=none");
       exit();
   }