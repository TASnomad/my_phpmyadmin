<?php

function __autoload($classname)
{
	if (file_exists(realpath(dirname(__FILE__).'/class/'.$classname.'.class.php')))
		require 'class/'.$classname.'.class.php';
}

//spl_autoload_register('');

?>
