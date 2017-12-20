<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", 1);

	require '../../Autoloader.php';
	Autoloader::register();
	$res = DB::checkUser($_POST["login"], $_POST["password"]);

	$base_dir  = __DIR__;
	$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
	$base_url  = preg_replace("!^${doc_root}!", '', $base_dir);
	$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
	$port      = $_SERVER['SERVER_PORT'];
	$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' 	&& $port == 443) ? '' : ":$port";
	$domain    = $_SERVER['SERVER_NAME'];
	$full_url  = "${protocol}://localhost${disp_port}/src/view";

	if ($res) {
		header("Location: $full_url/index.php");
	} else {
		header("Location: $full_url/index.php?error=login");
	}
?>
