<!DOCTYPE html>
<html>
	<head>
		<?php
		require_once("header.php");
		require_once("../../Autoloader.php");
		require_once("../models/forms/formSQLConsole.php");
		$test = DBconnection::getInstance();
		require_once("../class/formObject.class.php");
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
