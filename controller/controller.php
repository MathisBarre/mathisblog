<?php



function showHome() {
    require_once("model/ArticleManager.php");
    $ArticleManager = new \mania\blog\model\ArticleManager();
    $articlePreview = $ArticleManager->getArticlesPreviews();
    require_once('view/front/home.php');
}

function showAnArticle() {
    require_once("model/ArticleManager.php");
    require_once("model/CommentManager.php");
    $ArticleManager = new \mania\blog\model\ArticleManager();
    $CommentManager = new \mania\blog\model\CommentManager();
    $dataArticle = $ArticleManager->getArticleInfos($_GET["id"]);
    $dataComments = $CommentManager->getComments($_GET["id"]);
    require_once("view/front/an_article.php");
}

function addLike() {
    $id = $_GET["id"];
    require_once("model/ArticleManager.php");
    $ArticleManager = new \mania\blog\model\ArticleManager();
    $ArticleManager->addLike($id);
    header("Location: index.php?action=showAnArticle&id=".$id);
}

function addComment() {
    // Intégration des ressources
    require_once("model/CommentManager.php");
    require_once("model/UserManager.php");
    require_once("model/ArticleManager.php");
    $CommentManager = new \mania\blog\model\CommentManager();
    $UserManager = new \mania\blog\model\UserManager();
    $ArticleManager = new \mania\blog\model\ArticleManager();
    
    // Sécurisation du content
    $content = htmlspecialchars($_POST["message"]);

    // Validation / sécurisation de l'id
    if ($ArticleManager->isArticleExist($_GET["id"])) {
        $id_article = $_GET["id"];
    } else {
        throw new Exception("This article doesn't exist", 1);
    }

    // Validation / sécurisation du nickname
    if (isset($_SESSION["nickname"])) {
        $writter = $_SESSION["nickname"];
    } elseif (!($UserManager->isNicknameAlreadyUsed($_POST["nickname"]))) {
        $writter = htmlspecialchars($_POST["nickname"]);
    } else {
        throw new Exception("Nickname already used by a registred member", 1);
    }

    // Tâches
    $CommentManager->addComment($writter,$id_article,$content);
    header("Location: index.php?action=showAnArticle&alert=ACS&id=".$id_article);

}

function showContact() {

    require_once("view/front/contact.php");
}

function showError($error) {
    $errorMessage = $error;
    require_once("view/front/error.php");
}

function showLogin() {
    require_once("view/back/login.php");
}

function showSignUp() {
    require_once("view/back/signUp.php");
}