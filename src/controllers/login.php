<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();
	$user = new User($_POST["login"], $_POST["password"]);
	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";

	if ($user->check()) {
		session_start();
		$_SESSION["user"] = $_POST["login"];
		header("Location: $fullUrl/index.php");
	} else {
		header("Location: $fullUrl/index.php?err=Le mot de passe ou le login est incorrect");
	}
?>
