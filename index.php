<?php

require 'Autoloader.php';
Autoloader::register();

$session = Session::getInstance();

header("Location: src/view/index.php")

?>
