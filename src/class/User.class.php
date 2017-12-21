<?php
	class User {

		private $login;
		private $mdp;
		public $db;

		public function __construct($login, $mdp) {
			$this->login = $login;
			$this->mdp = $mdp;
			$this->db = $login;
		}

		public function create() {
			$conn = DBconnection::getInstance();
			$stmt = $conn->pdo->prepare("CREATE USER '?'@'localhost' IDENTIFIED BY '?'");
			if ($stmt->execute(array($this->login, $this->mdp))) {
				$stmt = $conn->pdo->prepare("CREATE DATABASE ?");
				if ($stmt->execute(array($this->login))) {
					$stmt = $conn->pdo->prepare("GRANT ALL PRIVILEGES ON ?.* to '?'@'localhost' IDENTIFIED BY '?'");
					$stmt->execute(array($this->login, $this->login, $this->mdp));
					$conn->pdo->exec("FLUSH PRIVILEGES");
				}
			}
		}

		public function check() {
			$conn = DBconnection::getInstance();
			$conn->pdo->exec("USE mysql");
			$stmt = $conn->pdo->prepare("SELECT User, Password FROM user WHERE User = ? AND Password = PASSWORD(?)");
			$res = $stmt->execute([$this->login, $this->mdp]);
			if ($res) {
				if ($stmt->rowCount() > 0) {
					return (true);
				}
			}
			return (false);
		}

		public function getDBs() {
			$conn = DBconnection::getInstance();
			$stmt = $conn->pdo->prepare("SELECT Db FROM mysql.db WHERE User = ?");
			$res = $stmt->execute([$this->login]);
			if ($res) {
				return ($stmt->fetchAll(PDO::FETCH_ASSOC));
			}
			return (array());
		}
	}
?>
