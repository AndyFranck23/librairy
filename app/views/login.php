<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="titre">
            <div class="connect">
                Login
            </div>
        </div>
        <div class="login">
            <form action="<?php base_url('login'); ?>" method="post">
                <li><input type="email" name="email" placeholder="rakoto@gmail.com"></li>
                <li><input type="password" name="password" placeholder="Mot de pass"></li>
                <li><input type="submit" class="btn" value="Se connecter"></li>
                <?php if($_SERVER['REQUEST_URI'] == '/login'): ?>
                        <p>Vous n'avez pas encore un compte?</p>
                        <a href="signIn">S'inscrire</a>
                <?php endif ?>
            </form>
        </div>
    </div>
</body>
</html>