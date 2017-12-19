<?php
function __autoload($classname)
{
	if (file_exists(realpath(dirname(__FILE__).'/src/class/'.$classname.'.class.php')))
		require 'src/class/'.$classname.'.class.php';
}
//spl_autoload_register('');
?>
