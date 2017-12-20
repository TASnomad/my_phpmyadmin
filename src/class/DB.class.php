<?php

class DB {
	public static function getDBFields($dbName) {
		$conn = DBconnection::getInstance();
		$stmt = $conn->pdo->prepare("DESCRIBE mysql.$dbName");
		$result = $stmt->execute();

		if ($result) {
			$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);
			return ($fields);
		}
		return (array());
	}

	public static function checkUser($login, $password) {
		$conn = DBconnection::getInstance();
		$conn->exec("USE mysql");
		$stmt = $conn->pdo->prepare("SELECT User, Password FROM user WHERE User = ? AND Password = ?");
		$res = $stmt->execute([$login, sha1(sha1($password))]);
		if ($res) {
			if ($stmt->rowCount() >= 0)
				return (true);
		}
		return (false);
	}
}

?>
