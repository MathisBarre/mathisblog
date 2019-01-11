<?php

namespace mania\blog\model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function addComment($writter,$id_article,$content) {
        $db = $this->dbConnect();
        $action = $db->prepare(
        "INSERT INTO comments (writter,id_article,content,DATE)
        VALUES (?,?,?,NOW())");
        $action->execute([$writter,$id_article,$content]);
    }

    public function getComments($id_article) {
        $db = $this->dbConnect();
        $req = $db->prepare(
        "SELECT content, DATE_FORMAT(date, '%d/%m/%Y (%Hh%i)') AS DATE,
        CASE 
            WHEN writter=u.nickname THEN u.nickname
            ELSE CONCAT('(Invité)  ', writter)
        END AS writter
        FROM comments c
        LEFT JOIN user u ON c.writter = u.nickname
        WHERE id_article = ?
        ORDER BY date");
        $req->execute([$id_article]);
        return $req;
    }
}
