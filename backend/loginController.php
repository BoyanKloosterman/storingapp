<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($statement->rowCount()<1){
    die("Gebruiker niet gevonden");
}

if(!password_verify($password, $user['password'])){
    die("Wachtwoord is niet correct");
}

$_SESSION['user_id']=$user['id'];
?>