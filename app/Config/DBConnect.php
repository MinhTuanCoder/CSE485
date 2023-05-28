<?php
require_once APP_ROOT.'/app/Config/config.php';
class DBConnection {
    private static $host=DB_HOST;
    private static $dbname=DB_NAME;
    private static $user=USER;
    private static $password=PASS;
    private static $conn;

  
    // public function __construct() {
    //   self::$host =DB_HOST;
    //   self::$user = USER;
    //   self::$password = PASS;
    //   self::$dbname =DB_NAME;
    // }
    public static function getConnection(){
        try{
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            return self::$conn;
          }
          catch(PDOException $e){
           self::$conn = null;
           return null;
    
          }
       
    }

}

  
   

?>