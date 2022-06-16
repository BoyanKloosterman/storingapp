
<!doctype html>
<html lang="nl">

<head>
    <title>registerPage</title>
    <?php require_once 'head.php'; ?>
</head>
<body>
    <?php require_once 'header.php'; ?>
    <main>
        <div class="login_main">
            <form class="login_form" action="../backend/registerController.php" method="POST">
                <div class="login_form_group">
                    <label for="email">Email:</label>
                    <input name="email" id="email"type="text" class="login_form_input">
                </div>
                <div class="login_form_group">
                    <label for="password">Wachtwoord:</label>
                    <input id="password" name="password" type="password" class="login_form_input">
                </div> 
                <div class="login_form_group">
                    <label for="password_check">Wachtwoord herhalen:</label>
                    <input id="password_check" name="password" type="password" class="login_form_input">
                </div> 
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </main>
</body>
</html>