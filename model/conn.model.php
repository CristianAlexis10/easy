<?php
class ConexionBD{
  private static $host = "localhost";
  private static $dbuser = "root";
  private static $dbname = "easy";
  private static $dbpass = "";
  private static $dbstatus = null;
  function openDB(){
      try {
          self::$dbstatus = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$dbuser,self::$dbpass);
          self::$dbstatus->exec("SET CHARACTER utf8");
      } catch (Exception $e) {
        die($e->getMessage());
      }
      return self::$dbstatus;
  }
  function close(){
    self::$dbstatus = null;
  }
}
?>
