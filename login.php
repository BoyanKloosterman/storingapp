<?php session_start(); ?>

<!doctype html>
<html lang="nl">

<form action="backend/loginController.php" method="POST">

<div class="form-group">
    <label for="username">Gebruikersnaam: </label>
    <input type="text" name="username" id="username">
</div>

<div class="form-group">
    <label for="password">Wachtwoord: </label>
    <input type="password" name="password" id="password">
</div>

<input type="submit" value="Inloggen">

</form>