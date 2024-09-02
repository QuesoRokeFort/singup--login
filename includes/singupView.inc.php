<?php

declare(strict_types =1);

function checkSingupErrors(){
    if(isset($_SESSION["errors_singup"])){
        $errors = $_SESSION["errors_singup"];
        ?>
<script>
        $(document).ready(function() {
            $("p").css("color", "red");
        });
</script>
        <?php
        foreach ($errors as $error){
            echo '<p>' .$error .'</p>';
        }
        unset($_SESSION["errors_singup"]);
    } elseif (isset($_GET["singup"]) && $_GET["singup"] == "success"){
        ?>
        <script>
        $(document).ready(function() {
            $("p").css("color", "green");
        });
        </script>
        <?php
        echo "<p>Signup Success</p>";
    }
}

function singupInputs(){        

    echo    '<label for="Username"> Username:</label><br>';
    if(isset($_SESSION["signup_data"]["username"]) &&
        !isset($_SESSION["errors_singup"]["username_taken"])){
        echo   '<input id="username" type="text" name="username" placeholder="Username" value="' . 
        $_SESSION["signup_data"]["username"] . '"> <br>';
    }else{
        echo    '<input id="username" type="text" name="username" placeholder="Username"> <br>';
    }
    echo    '<label for="Password"> Password:</label><br>';
    echo    '<input id="password" type="text" name="password" placeholder="Password"> <br>';


    
    echo '<label for="Email"> Email:</label><br>';
    if(isset($_SESSION["signup_data"]["email"]) &&
        !isset($_SESSION["errors_singup"]["email_invalid"])&&
        !isset($_SESSION["errors_singup"]["email_taken"])){
        echo   '<input id="email" type="text" name="email" placeholder="Email@gmail.com" value="' . 
        $_SESSION["signup_data"]["email"] . '"> <br>';
    }else{
        echo    '<input id="email" type="text" name="email" placeholder="Email@gmail.com"> <br>';
    }
}