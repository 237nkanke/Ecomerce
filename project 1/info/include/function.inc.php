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
