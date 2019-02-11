
<?php 
$title = "Article";
ob_start();
?>

<div class="bannerInArticle">
</div>

<article class="article centered-box">
    <h1><?= $dataArticle["title"] ?></h1>
    <p>
        <?= $dataArticle["content"] ?>
    </p>
    <div class="article-footer">
        <div class="article-info">Écrit le <?= $dataArticle["date"] ?></div>
        <div class="article-info">
            <img src="public/img/eye.svg" alt="icone oeil"> x
            <img src="public/img/thumbs-up.svg" alt="icone like"> <?= $dataArticle["nb_like"] ?>
            <img src="public/img/chat.svg" alt="icone commentaires"> <?= $dataArticle["nb_comment"] ?>
        </div>
    </div>
</article>
<div class="div-action centered-box">
    <a href="index.php?action=addLike&id=<?= $_GET["id"] ?>" class="action action1">Aimez ! (WIP)</a>
    <a href="#" class="action action2" id="like">Commentez !</a>
    <a href="#" class="action action3">Partagez ! (comming soon)</a>
</div>
<div class="div-addComment centered-box" id="addComment">
    <form action="index.php?action=addComment&id=<?= $_GET["id"]?>" method="post">
        <?php if (!isset($_SESSION["nickname"])) { ?>
            <input type="text" name="nickname" id="nickname" placeholder="Pseudonyme ou nom/prénom">
        <?php } ?>
        <textarea name="message" id="message" rows="5" placeholer="Votre message"></textarea>
        <input type="submit" value="Envoyer votre message">
    </form>
</div>
<?php while ($dataComment = $dataComments->fetch()) { ?>
    <div class="div-comment centered-box">
        <h3><?= $dataComment["writter"] ?>  <span class="date">- <?= $dataComment["mDATE"] ?></span></h3>
        <p><?= $dataComment["content"] ?></p>
    </div>
<?php 
}
$dataComments->closeCursor();
?>



<?php
$content = ob_get_clean() ;
require("template.php");
?>

