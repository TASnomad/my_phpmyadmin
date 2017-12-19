<?php

class DBconnection {
	private $dbString = "mysql:host=localhost;dbname=mysql";
	private $login = "root";
	private $password = "root";

	private static $instance = null;

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new DBconnection();
		}
		return (self::$instance);
	}

	private function __construct($throwError = true) {
		self::$instance = new PDO($this->dbString, $this->login, $this->password);

		if ($throwError && self::$instance->instance) {
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::EXECPTION_MODE);
		}
	}
}

?>
