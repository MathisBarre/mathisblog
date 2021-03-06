<?php

session_start();

require_once("controller/controller.php");
require_once("model/ArticleManager.php");
$ArticleManager = new \mania\blog\model\ArticleManager();

function actionIs($action) {
    if ($_GET["action"] === $action) {
        return true;
    } else {
        return false;
    }
}

try {
   
    if (isset($_GET["action"]) AND !empty($_GET["action"])) {
        
        $action = $_GET["action"];
        
        if (actionIs("showAnArticle") AND !isset($_GET["id"]) AND !($ArticleManager->isArticleExist($_GET["id"]))) {

            throw new Exception("Cette article n'existe pas ou plus", 1);
            
        } 
        // Gère la création de compte
        if (actionIs("createAccount")) {

            require_once("model/UserManager.php");
            $UserManager = new \mania\blog\model\UserManager();

            $nickname = htmlspecialchars($_POST["nickname"]);

            $password = $_POST["password"];

            $password2 = $_POST["password2"];

            if (!($UserManager->isNicknameAlreadyUsed($nickname))) {

                if (strlen($password) >= 6) {

                    if ($password === $password2) {

                        createAccount($nickname,$password);

                    }

                    else {
    
                        throw new Exception("Les deux mots de passe entrés ne sont pas les mêmes", 1);
                        
                    }
                } else {
                    throw new Exception("Mot de passe trop petit (moins de 6 caractères)", 1);
                    
                }
            } 
            else {

                throw new Exception("Nom d'utilisateur déjà utilisé", 1);
                
            }
        }
        elseif (actionIs("connection")) {

            require_once("model/UserManager.php");
            $UserManager = new mania\blog\model\UserManager();
            $userInfos = $UserManager->getInfosFromNickname($_POST["login"]);
            $nickname = $userInfos["nickname"];
            $hash = $userInfos["password"];
            $role = $userInfos["role"];

            if ( password_verify($_POST["password"], $hash) ) {

                connection($nickname,$role);

            } else {
                
                throw new Exception("Mauvais mot de passe", 1);
                

            }

        }
        elseif (function_exists($action)) {
            // Fonction dynamique
            $action();

        } 
        else {

            throw new Exception("Error Processing Request", 1);
            
        }

    } 
    else {

        showHome();

    }
} 
catch (Exception $e) {
    
    showError($e->getMessage());

}
