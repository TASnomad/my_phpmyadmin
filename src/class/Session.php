<?php

class Session
{
  private static $instance = null;

  public static function getInstance(){
    $session = self::$instance ?? new Session();
    self::$instance = $session;
    return self::$instance;
  }

  private function __construct()
  {
    session_start();
  }
}

?>
