<?php

function __autoload($classname)
{
	if (file_exists(realpath($_SERVER['DOCUMENT_ROOT'].'/src/class/'.$classname.'.class.php')))
		require 'src/class/'.$classname.'.class.php';
}

?>
