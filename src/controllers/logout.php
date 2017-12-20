<?php

$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$fullUrl  = "${protocol}://". $_SERVER['HTTP_HOST']."/src/view";

session_start();
session_destroy();

header("Location: $fullUrl/index.php");

?>
