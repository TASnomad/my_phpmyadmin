<?php

/**
 * @author Martin Barreau
 * @description Classe permettant de gérer une base de données MySQL
 */

class Database {
	private $name;

	/**
	 * @param $name Nom de la base de données
	 */
	public function __construct($name) {
		$this->name = $name;
	}

	/**
	 * @description Méthode permettant de créer une base de données vide
	 */
	public function createDB() {
		$conn = DBconnection::getInstance();
		$conn->pdo->exec("CREATE DATABASE $this->name");
	}

	/**
	 * @description Méthode permettant de renommer
	 * @param $newName nouveau nom de la base données
	 */
	public function renameDB($newName) {
		$conn = DBconnection::getInstance();

		/* Get all tables names from the old DB */
		$conn->pdo->exec("USE $this->name");
		$name = $conn->pdo->query("SHOW TABLES");
		$name = $name->fetchAll(PDO::FETCH_COLUMN);

		/* Create the new DB */
		$conn->pdo->exec("CREATE DATABASE $newName");
		$conn->pdo->exec("USE $newName");

		/* Copy data */
		foreach($name as $one) {
			$conn->pdo->exec("CREATE TABLE $one LIKE $this->name.$one");
			$conn->pdo->exec("INSERT INTO $one SELECT * FROM $this->name.$one");
		}

		$conn->pdo->exec("DROP DATABASE $this->name");
		$this->name = $newName;
	}

	public function statDB() {
		$conn = DBconnection::getInstance();

		$data = $conn->pdo->query("SHOW TABLE STATUS FROM $this->name LIKE '%'");
		if (!$data) {
			return (array());
		}
		$data = $data->fetchAll(PDO::FETCH_ASSOC);
		// We can return the first array dimension, because all needed data are here
		if (empty($data))
			return (array());
		return ($data[0]);
	}

	public function deleteDB() {
		$conn = DBconnection::getInstance();
		$conn->pdo->exec("DROP DATABASE $this->name");
	}

	public function getTablesNames() {
		$conn = DBconnection::getInstance();
		$stmt = $conn->pdo->prepare("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA=?");
		if ($stmt->execute(array($this->name))) {
			$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
			return ($tables);
		}
		return (array());
	}

	public static function getAllDBs($excludeSysDB = true) {
		$conn = DBconnection::getInstance();
		$dbs = $conn->pdo->query("SHOW DATABASES");
		$dbs = $dbs->fetchAll(PDO::FETCH_COLUMN);
		$res = array();
		if ($excludeSysDB) {
			foreach($dbs as $one) {
				if ($one != "information_schema" && $one != "mysql" && $one != "performance_schema")
				array_push($res, $one);
			}
			return ($res);
		}
		return ($dbs);
	}
}

?>
