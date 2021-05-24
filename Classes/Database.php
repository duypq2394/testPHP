<?php
namespace App\Classes;

use App\Config\Config;

class Database {

    private $username = null, $password = null, $dsn = null;

    public $database;

    public $errors;

    private static $dbInstance = null;

    // private function __construct(){
    //     $this->username = Config::get('mysql/username');
    //     $this->password = Config::get('mysql/password');
    //     $this->dsn = 'mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/database');

    //     array ( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION );

    //     try{
    //         $this->database = new \PDO($this->dsn, $this->username, $this->password);
    //     }catch( \PDOException $ex ) {
    //         $this->errors = $ex;
    //     }
    // }

    public static function connect(){
        if (!isset(self::$dbInstance)) {
            try {
              self::$dbInstance = new \PDO('mysql:host=localhost;dbname=coffeedb', 'root', '');
              self::$dbInstance->exec("SET NAMES 'utf8'");
            } catch (PDOException $ex) {
              die($ex->getMessage());
            }
          }
      return self::$dbInstance;
    }
}
?>