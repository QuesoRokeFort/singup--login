<?php

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = htmlspecialchars($_POST["username"]);
    $psw = htmlspecialchars($_POST["password"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'loginModel.inc.php';
        require_once 'loginContr.inc.php';

        $errors =[];
        if(isInputEmpty($username,$psw)){
            $errors["input_empty"] = "Llene todos los campos";
        }
        $result = getUser($pdo,$username);
        if(usernameNotExist($result)){
            $errors["username_not_exits"]="Usuario inexistente";
        }else{
            if(incorrectPassword($psw,$result["pwd"])){
                $errors["incorrect_password"]="Contraseña incorrecta";
            }
        }

        require_once'config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessionId= session_create_id();
        $sesssionId = $newSessionId . "_" . $result["id"];
        session_id($sesssionId);

        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regen"] = time();

        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Login failed:" . $e->getmessage());
    }
}else{
    header("Location: ../index.php");
    die();
}


