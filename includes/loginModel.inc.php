<?php
function getUser(object $pdo,String $username){
    $query = "SELECT * FROM users WHERE username=:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
