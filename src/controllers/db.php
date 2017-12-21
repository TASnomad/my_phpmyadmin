<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();

	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";

	if (isset($_POST["rename"])) {
		$db = new Database($_POST["oldName"]);
		$db->renameDB($_POST["name"]);
		header("Location: $fullUrl/db.php");
	}

	if (isset($_POST["create"])) {
		$db = new Database($_POST["name"]);
		$db->createDB();
		header("Location: $fullUrl/db.php");
	}

?>
