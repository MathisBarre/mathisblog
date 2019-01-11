<?php 

namespace mania\blog\model ;

class Manager
{
    protected function dbConnect () 
    {
        $host = "localhost";
        $dbname = "mathisblog";
        $login = "root";
        $pswd = "";
        $db = new \PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8", $login , $pswd );
        return $db;
    }
}
