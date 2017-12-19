<!DOCTYPE html>
<html>
	<head>
		<?php 
		require_once("header.php"); 
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
		$test = new formObject($test, [0 => $field], "lol", "POST");
		$test->toString();
		?>
	</body>
</html>
