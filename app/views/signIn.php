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
                Sign In
            </div>
        </div>
        <div class="login">
            <form action="<?php base_url('signIn'); ?>" method="post">
                <li><input type="text" name="email" placeholder="rakoto@gmail.com"></li>
                <li><input type="password" name="password" placeholder="Mot de pass"></li>
                <li><input type="password" name="truePassword" placeholder="Confirmation du mot de pass" ></li>
                <li><input type="submit" class="btn" value="Inscrire"></li>
                <p>Vous avez déjà un compte?</p>
                <a href="login">Se connecter</a>
            </form>
        </div>
    </div>
</body>
</html>