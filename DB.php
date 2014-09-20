<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 8/7/14
 * Time: 7:30 AM
 */

class DB {
    private static $pdo = null;
    public static function getPDO(){
        if(is_null(self::$pdo)){
//            $dsn = 'mysql:dbname=papangping_nai;host=localhost';
//            $user = 'papangping_nai';
//            $password = '111111';

            $dsn = 'mysql:dbname=nai;host=localhost';
            $user = 'root';
            $password = '111111';
            self::$pdo = new PDO($dsn, $user, $password);
            self::$pdo->exec("set names utf8");
        }
        return self::$pdo;
    }
}