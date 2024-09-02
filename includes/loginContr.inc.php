<?php

function isInputEmpty(string $username, string $psw){
    if(empty($username) || empty($psw)){
        return true;
    }else{
        return false;
    }
}

function usernameNotExist(bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}
function incorrectPassword(string $pwd,string $dbpwd){
    if(!password_verify($pwd,$dbpwd)){
        return true;
    }else{
        return false;
    }
}