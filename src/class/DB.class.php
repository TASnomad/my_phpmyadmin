<?php

class DB {
	public static function getDBFields($dbName) {
		$conn = $DBconnection::getInstance();
		$stmt = $conn->prepare("DESCRIBE mysql.$dbName");
		$result = $stmt->execute();

		if ($result) {
			$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);
			return ($fields);
		}
		return (array());
	}
}

?>
