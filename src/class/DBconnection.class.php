<?php

class DBconnection {

	private $dbString = "mysql:host=localhost;dbname=mysql";
	private $login = "root";
	private $password = "root";

	private $instance = null;

	public static function getInstance() {
		if ($instance == null) {
			self::$instance = new DBconnection();
		}
		return (self::$instance);
	}

	private function __construct($throwError = true) {
		$this->instance = new PDO($this->dbString, $this->login, $this->password);

		if ($throwError && $this->instance) {
			this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::EXECPTION_MODE);	
		}
	}
}

?>
