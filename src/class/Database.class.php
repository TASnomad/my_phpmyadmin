<?php

class Database {
	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	public function createDB() {
		$conn = DBconnection::getInstance();
		$conn->pdo->exec("CREATE DATABASE $this->name");
	}

	public function renameDB($newName) {
		$conn = DBconnection::getInstance();
		$conn->pdo->exec("CREATE DATABASE $newName");
		$conn->pdo->exec("RENAME TABLE $this->name.* TO $newName");
		$conn->pdo->exec("DROP DATABASE $this->name");
		$this->name = $newName;
	}

	public function deleteDB() {
		$conn = DBconnection::getInstance();
		$conn->pdo->exec("DROP DATABASE $this->name");
	}
}

?>
