<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Le blog de Mathis : <?= $title ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/styleArticle.css">
</head>
<body>
    <header class="topbar">
        <div class="centered-box topbar-box">
            <h1 class="logo"><a href="index.php">Le blog de Mathis</a></h1>
            <nav class="topbar-nav">
                <a href="index.php?action=showHome" class="active">Acceuil</a><!--
             --><a href="index.php?action=showResults">Résultats</a><!--
             --><a href="index.php?action=showContact">Contact</a>
             
            </nav>
            <?php if (!isset($_SESSION["nickname"])) { ?>
                <a href="index.php?action=showLogin"><div class="topbar-button">Se connecter</div></a>
            <?php } else { ?>
                <div class="nicknameBox">
                    <p>
                        <span class="nicknameInBar"><?= $_SESSION["nickname"] ?><span>
                        <a href="index.php?action=deconnection">
                            <div class="topbar-button">Deconnexion</div>
                        </a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </header>
    
    <?= $content ?>

    <!--<footer>
            <div>Icons made by<a href="https://www.flaticon.com/authors/dave-gandy" title="Dave Gandy">Dave Gandy</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 	title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            <div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            <div>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            <div>Icons made by<a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 	title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
    </footer>-->
    <footer class="footer">
        <div class="centered-box">
            <div class="footer-flex ">
            
                <div class="footer-div">
                    <h3>Plan du site</h3>
                    <p>Comming soon</p>
                </div>
                
                <div class="footer-div">
                    <h3>Mes autres sites</h3>
                    <p>Comming soon</p>
                </div>
                
                <div class="footer-div">
                    <h3>Réseaux sociaux</h3>
                    <p>Comming soon</p>
                </div>
                
                </div>
                
            </div>
            <div class="footer-footer">
                    <p class="centered-box">Par Mathis Barré</p>
            </div>
        </div>
    </footer>
    <script src="public/js/script.js"></script>
</body>
</html>