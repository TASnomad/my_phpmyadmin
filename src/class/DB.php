<?php

class DB
{
  private static $instance = null;

  private $pdo = null;

  public static function getInstance(){
    $session = self::$instance ?? new DB();
    self::$instance = $session;
    return self::$instance;
  }

  private function __construct()
  {
    $this->pdo = new \PDO('mysql:dbname=mysql;host=localhost', 'root', 'root');
  }
}

?>
