<?php
namespace App\Classes;

use App\Config\Config;
/**
  * Setting and connectting to database
  */
class Database {

    private $dsn = null;

    private static $dbInstance = null;

    public static function connect(){
      $dsn = "sqlsrv:Server=coffeedatabase.mssql.somee.com;Database=coffeedatabase";
        if (!isset(self::$dbInstance)) {
            try {
              self::$dbInstance = new \PDO($dsn, "duypq94_SQLLogin_1", "ebva9yk4u7");
            } catch (PDOException $ex) {
              die($ex->getMessage());
            }
          }
      return self::$dbInstance;
    }
}
?>