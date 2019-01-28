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
    <a href="index.php" class="back"><- Revenir à la page d'accueil</a>
    <div class="connection">
        <div class="brand">
            <img src="public/img/connect.svg" alt="Icône de connexion">
            <h3>Créer un compte</h3>
        </div>
        <form method="post" action="index.php?action=createAccount">
            <input type="text" placeholder="Nickname" name="Nickname">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Repeat password " name="password2">
            <input type="submit">
        </form>
        <a href="index.php?action=showLogin">Se connecter</a>
    </div>
</body>
</html>