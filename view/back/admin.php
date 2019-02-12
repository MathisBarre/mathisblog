<?php 
if ( isset($_SESSION["role"]) AND $_SESSION["role"] === "admin") {

    echo "Hello on admin.php : ". $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
</head>
<body>
    <h1>Ajouter un article</h1>
    <form method="post" action="index.php?action=addArticle">
        <input type="text" name="titleArticle">
        <textarea name="contentArticle" id="contentArticle" cols="30" rows="10"></textarea>
        <input type="submit" value="Ajouter un nouvel article">
    </form>
</body>
</html>












































<?php
} else {

    throw new Exception("Vous n'êtes pas autorisé à accéder à ce contenu", 1);
    
}
?>