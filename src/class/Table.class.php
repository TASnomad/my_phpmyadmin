<?php

class Table {
	private $dbName;
	private $name;

	public function __construct($db = "", $name = "") {
		$this->dbName = $db;
		$this->name = $name;
	}

	public function createTable($types = array(), $fields = array()) {
		$sql = "CREATE TABLE $this->dbName.$this->name (";

		for ($cpt = 0; $cpt < count($fields); $cpt++) {
			$sql .= $fields[$cpt]." ".$types[$cpt].", ";
		}
		$sql = rtrim($sql, ", ");
		$sql .= ")";
		var_dump($sql);
		$conn = DBconnection::getInstance();
		$conn->pdo->exec($sql);
	}
}

?>
