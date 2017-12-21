<!DOCTYPE html>
<html>
	<head>
		<?php

		error_reporting(E_ALL | E_STRICT);
		ini_set("display_errors", 1);
		require_once("header.php");
		require_once("../../Autoloader.php");
		require_once("../models/forms/formSQLConsole.php");
		Autoloader::register();
		$test = DB::getDBFields("user");
		require_once("../class/formObject.class.php");
		?>
	</head>

	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<?php if(isset($_GET["error"])) : ?>
			<h1>Erreur de login</h1>
		<?php endif; ?>
		<h1 class="center"> Welcome to our website ! </h1>
		<?php
		$field = [];
		$field['name'] = "login";
		$field['type'] = "text";
		$err = "";
		if (isset($_GET['err'])){
		    $err = $_GET['err'];
		}
		$field['error'] = $err;

		$f2 = [];
		$f2['name'] = "password";
		$f2['type'] = "password";
		$test = new formObject("connexion", [0 => $field, 1 => $f2], "../controllers/login.php", "POST");
		
		echo $test->toString();
		
		
		?>
	</body>
</html>
