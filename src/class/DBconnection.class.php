<?php

class DBconnection {
	private $dbString = "mysql:host=localhost;dbname=mysql";
	private $login = "root";
	private $password = "root";

	private static $instance = null;
	public $pdo;

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new DBconnection();
		}
		return (self::$instance);
	}

	private function __construct($throwError = true) {
		$this->pdo = new PDO($this->dbString, $this->login, $this->password);

		if ($throwError && self::$instance) {
			$this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
}

?>
