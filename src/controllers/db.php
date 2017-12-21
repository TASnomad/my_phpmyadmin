<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();

	$db = new Database($_POST["name"]);
	$db->createDB();

	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";
	header("Location: $fullUrl/db.php");
?>
