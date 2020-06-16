<?php


class Db
{

private static $db;    
    public static function getConnection()
    {
        if(!isset($db))
        {



        $dsn = "mysql:host=" . DB_HOST  ;"dbname=". DB_NAME;
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
                $db-> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $db->exec("set names utf8");
        
      }
        return $db;
    }

}
