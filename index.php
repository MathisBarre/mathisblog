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
        // Fonction dynamique

        $action = $_GET["action"];
        if (actionIs("showAnArticle") AND !isset($_GET["id"]) AND !($ArticleManager->isArticleExist($_GET["id"]))) {
            throw new Exception("Cette article n'existe pas ou plus", 1);
            
        } 
        elseif (function_exists($action)) {

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
