<?php

namespace mania\blog\model;

require_once("model/Manager.php");

class UserManager extends Manager {
    public function isNicknameAlreadyUsed($nickname) {
        $db = $this->dbConnect();
        $query = $db->prepare("SELECT count(nickname) as nb_same_nickname FROM USER WHERE nickname= ? ");
        $query->execute([$nickname]);
        $data = $query->fetch();
        if ($data["nb_same_nickname"] > 0) {
            return true;
        } else {
            return false;
        }
    }
}