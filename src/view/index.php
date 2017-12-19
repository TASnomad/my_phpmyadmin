<!DOCTYPE html>
<html>
	<head>
		<?php
		require_once("header.php");
		require_once("../../autoload.php");
		$test = DBconnection::getInstance();
		var_dump($test);
		require_once("../class/formObject.class.php");
		?>
	</head>

	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<h1> TEST </h1>
		<?php
		$field = [];
		$field['name'] = "test";
		$field['type'] = "password";
		$test = new formObject("form1", [0 => $field], "lol", "POST");
		echo $test->toString();
		?>
	</body>
</html>
