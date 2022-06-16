<?php session_start();
if(!isset($_SESSION['user_id']))
{
    die("Je bent al ingelogd");
}

$email = $_POST['email'];

if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "Email is valid";
}
else
{
    echo "Email is invalid";
}

$password = $_POST['password'];
$password_check = $_POST['password_check'];

if ($password != $password_check)
{
    die("Wachtwoorden komen niet overeen");
}

require_once 'conn.php';
$query = "SELECT * from users WHERE username = :email";
$statement = $conn->prepare($query);
$statement->execute([":email" => $email]);
if ($statement->rowCount() > 0)
{
    die("Email is al in gebruik");
}
if (empty($email) || empty($password))
{
    die("Vul alle velden in");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, password) VALUES (:email, :hash)";
$statement = $conn->prepare($query);
$statement->execute([
    ":email" => $email,
    ":hash" => $hash,
]);

header("Location: ../meldingen/index.php");
exit;
?>