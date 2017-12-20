<!DOCTYPE html>
<html>
	<head>
		<?php
		error_reporting(E_ALL | E_STRICT);
		ini_set("display_errors", 1);
		require_once("header.php");
		require_once("../../Autoloader.php");
		require_once("../models/forms/formSQLConsole.php");
		$test = DB::getDBFields("user");
		require_once("../class/formObject.class.php");
			error_reporting(E_ALL | E_STRICT);
			ini_set("display_errors", 1);
			require_once("header.php");
			require_once("../../Autoloader.php");
			Autoloader::register();
		?>
	</head>

	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<h1> TEST </h1>
		<?php
		$field = [];
		$field['name'] = "login";
		$field['type'] = "text";

		$f2 = [];
		$f2['name'] = "password";
		$f2['type'] = "password";
		$test = new formObject("connexion", [0 => $field, 1 => $f2], "lol", "POST");
		echo $test->toString();

		createSQLConsole();
		?>
	</body>
</html>
