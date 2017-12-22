<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();

	$types = array();
	$fields = array();

	array_push($fields, $_POST["one"]);
	array_push($fields, $_POST["two"]);
	array_push($fields, $_POST["three"]);

	array_push($types, $_POST["T1"]);
	array_push($types, $_POST["T2"]);
	array_push($types, $_POST["T3"]);

	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";

	$table = new Table($_POST["name"], $_POST["tname"]);
	$table->createTable($types, $fields);
	header("Location: $fullUrl/table.php");
?>
