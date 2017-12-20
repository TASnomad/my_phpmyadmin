<?php

class Autoloader
{
	public static function autoload($classname)
	{
		if (file_exists(realpath(dirname(__FILE__).'/src/class/'.$classname.'.class.php')))
			require realpath(dirname(__FILE__).'/src/class/'.$classname.'.class.php');
	}

	public static function register()
	{
		spl_autoload_register(array(__CLASS__ ,'autoload'));
	}
}

?>
