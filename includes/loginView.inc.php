<?php

function checkloginErrors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];
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
        unset($_SESSION["errors_login"]);
    } 
}

function loginInterface(){
    echo "session dump: ";
    var_dump($_SESSION);
}
