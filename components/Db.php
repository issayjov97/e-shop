<?php

class Db
{

private static $db;    
    public static function getConnection()
    {
        if(!isset($db))
        {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");
        
      }
        return $db;
    }

}
