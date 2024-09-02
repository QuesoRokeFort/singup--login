<?php

declare(strict_types =1);

function isInputEmpy( $username, $password, $email) {
    if(empty($username)|| empty($password) || empty($email)){
        return true;
    }else{
        return false;
    }
}

function isUsernameTaken(object $pdo, $username) {
    if(empty(getUsername($pdo ,$username))){
        return false;
    }else{
        return true;
    }
}
function isEmailTaken(object $pdo, $email) {
    if(empty(getEmail($pdo,$email))){
        return false;
    }else{
        return true;
    }
}
function isEmailInvalid($email) {
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function createUser(object $pdo,string $username,string $password,string $email){
    insertUser( $pdo, $username, $password, $email);
}