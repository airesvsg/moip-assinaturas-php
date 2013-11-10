<?php
	
	if(!function_exists('MoipAutoload')){
		function MoipAutoload($class){
			$file = dirname(__FILE__)."/{$class}.php";
			if(file_exists($file)){
				require_once($file);
			}
		}
		spl_autoload_register('MoipAutoload');
	}