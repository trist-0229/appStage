<?php
spl_autoload_register('app_autoload');

function app_autoload($class){
	if(file_exists("class/$class.php")){
		require "class/$class.php";
	} else if (file_exists("../class/$class.php")) {
		require "../class/$class.php";	
	}
}