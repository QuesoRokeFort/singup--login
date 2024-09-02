<?php
include_once 'includes/config_session.inc.php';
include_once 'includes/singupView.inc.php';
include_once 'includes\loginView.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        div{
            background-color: grey;
            width: 200px;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }
        p{
            margin: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    if (!isset($_SESSION["user_id"])) {
    ?>
        <div>
            <form action="includes/singup.inc.php" method="post">
                <?php
                singupInputs();
                ?>
                <button type="submit">Signup.</button>
            </form>
            <?php
            checkSingupErrors();
            ?>
        </div>
    <?php } ?>
    <?php
    if (!isset($_SESSION["user_id"])) {
    ?>
    <div>
        <form action="includes/login.inc.php" method = "post">
            <label for="Username"> Username:</label><br>
            <input id="username" type="text" name="username" placeholder="Username"> <br>

            <label for="Password"> Password:</label><br>
            <input id="password" type="text" name="password" placeholder="Password"> <br>

            <button type="submit">Login</button>
        </form>
        <?php
            checkloginErrors();
            ?>
    </div>
    <?php } ?>
    <?php
    if (isset($_SESSION["user_id"])) {
    loginInterface();
    }
    ?>
    <?php
    if (isset($_SESSION["user_id"])) {
        ?>
    <div>
    <form action="includes/logout.inc.php" method ="post">
        <button type="submit">Logout</button>
    </form>
    </div>
    <?php } ?>
</body>
</html>