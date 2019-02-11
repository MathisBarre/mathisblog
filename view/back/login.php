<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="login">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="back"><- Revenir en arrière</a>
    <div class="connection">
        <div class="brand">
            <img src="public/img/connect.svg" alt="Icône de connexion">
            <h3>Se connecter</h3>
        </div>
        <form action="post">
            <input type="text" placeholder="Login" name="login">
            <input type="password" placeholder="Password" name="password">
            <input type="submit">
        </form>
        <a href="index.php?action=showSignUp">Créer un compte</a>
    </div>
</body>
</html>