<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();
if(isset($_SESSION["user_id"])){
    if(!isset($_SESSION["last_regen"])){
        regenerate_session_id_loggedin();
    }else{
        $interval = 60*30;
        if (time() - $_SESSION["last_regen"] >= $interval){
            regenerate_session_id_loggedin();
        }
    }
}else{
    if(!isset($_SESSION["last_regen"])){
        regenerate_session_id();
    }else{
        $interval = 60*30;
        if (time() - $_SESSION["last_regen"] >= $interval){
            regenerate_session_id();
        }
    }
}

function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION["last_regen"]=time();
}

function regenerate_session_id_loggedin(){
    session_regenerate_id(true);

    $userId =$_SESSION["user_id"];
    $newSessionId= session_create_id();
    $sesssionId = $newSessionId . "_" . $userId;
    session_id($sesssionId);

    $_SESSION["last_regen"]=time();

}