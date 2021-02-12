<?php
/**
 * Portfolio Database
 *
 * @author pkelly
 * @date 2/12/21
 * @log transfer 
 */
class Database {
    
    private static $dsn = 'mysql:host=localhost;dbname=pkptfolio';
    private static $username = 'pk_admin';
    private static $password = 'Pa$$w0rd';
    private static $db;
    
    private function construct() {}
    
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
                exit();
            }
        }
        return self::$db;
    }
    //put your code here
}
