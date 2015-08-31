<?php

function autoload($className)
{
	$ns2dir = explode('\\', $className);
	$ns2dir[0] = 'src';

	$className = implode('/', $ns2dir) . '.php';

	if(file_exists($className)) {
		require $className;
	}
}


spl_autoload_register('autoload');