<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();

	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";

  if (isset($_POST["create"])) {
    $db = new Table($_POST[""]);
    $db->createTable($_POST[""]);
    header("Location: $fulUrl/db.php");
  }

  ?>
