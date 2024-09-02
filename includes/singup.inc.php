<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = htmlspecialchars($_POST["username"]);
    $pwd = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);

    try {
        require_once 'dbh.inc.php';
        require_once 'singupModel.inc.php';
        require_once 'singupContr.inc.php';

        $errors =[];

        if(isInputEmpy($username,$pwd,$email)){
            $errors["empty_input"]= "Llene todos los campos";
        }
        if(isUsernameTaken($pdo,$username)){
            $errors["username_taken"]= "Usuario ya registrado";
        }
        if(isEmailInvalid($email)){
            $errors["email_invalid"]="Email no valido";
        }
        if(isEmailTaken($pdo ,$email)){
            $errors["email_taken"]="Email ya registrado";
        }
        

        require_once'config_session.inc.php';

        if($errors){
            $_SESSION["errors_singup"] = $errors;
            header("Location: ../index.php");

            $sigupData =[
                "username" =>$username,
                "email" =>$email,
            ];
            $_SESSION["signup_data"] = $sigupData;
            die();
        }

        createUser($pdo,$username,$pwd,$email);
        header("Location: ../index.php?singup=success");
        $pdo=null;
        $stmt=null;

        die();
    } catch (PDOException $e) {
        die("Query fallida: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
    die();
}