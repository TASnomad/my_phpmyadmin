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
		require_once("../class/formObject.class.php");
		?>
	</head>

	<body>
		<?php require_once('../models/nav/nav.php'); ?>
		<h1 class="center "> ConsoleSQL </h1>

		<?php 
		$err = "";
		if (isset($_GET['err'])){
		    $err = $_GET['err'];
		}
		
		if (isset($_GET['msg'])){
		    formSuccess($_GET['msg']);
		}
		
		if (isset($_GET['error'])){
		    formError($_GET['error']);
		}
		createSQLConsole($err);
		
		?>
	</body>
</html>
