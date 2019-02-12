<?php

namespace mania\blog\model;

require_once("model/Manager.php");

class ArticleManager extends Manager
{
    public function getArticlesPreviews() {
        $db = $this->dbConnect();
        $req = $db->query(
            "SELECT  a.id, a.title , a.pre_content , a.nb_like, COUNT(c.id) AS nb_comment , DATE_FORMAT(a.DATE, '%d/%m/%Y (%Hh%i)') AS date , a.vizu_img , a.writter
            FROM articles a
            LEFT JOIN USER u ON a.writter = u.nickname
            LEFT JOIN comments c ON a.id = c.id_article
            GROUP BY a.id
            ORDER BY a.id DESC ");
        return $req;
    }

    public function getArticleInfos($id) {
        $db = $this->dbConnect();
        $req = $db->prepare(
            "SELECT a.id,nb_like, a.content, title , a.writter, COUNT(c.id) AS nb_comment, DATE_FORMAT(a.DATE, '%d/%m/%Y (%Hh%i)') AS date
            FROM articles a
            LEFT JOIN USER u ON a.writter = u.nickname
            LEFT JOIN COMMENTs c ON a.id = c.id_article
            WHERE a.id = ?");
        $req->execute([$id]);
        $articleInfos = $req->fetch();
        return $articleInfos;
    }

    public function addLike($id) {
        $db = $this->dbConnect();
        $action = $db->prepare(
        "UPDATE articles
        SET nb_like = nb_like +1
        WHERE id = ?");
        $action->execute([$id]);
    }

    public function isArticleExist($id) {
        $db = $this->dbConnect();
        $query = $db->prepare("SELECT count(id) as nb_article FROM articles WHERE id= ? ");
        $query->execute([$id]);
        $data = $query->fetch();
        if ($data["nb_article"] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addArticle($title,$content) {
        $db = $this->dbConnect();
        $query = $db->prepare("INSERT INTO articles (title,content,writter) VALUES (?,?,?)");
        $query->execute([$title,$content,$_SESSION["nickname"]]);
    }
}