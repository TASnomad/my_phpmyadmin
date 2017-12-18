<?php

function __autoload($classname)
{
	if (file_exists(realpath(dirname(__FILE__).'/class/'.$classname.'.php')))
		require 'class/'.$classname.'.php';
}

?>
