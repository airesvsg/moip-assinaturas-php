<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipHelper {

		public static function isArray($obj){
			return is_array($obj) && count($obj) > 0 ? $obj : false;
		}

		public static function isEmail($email){
			return !preg_match( "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email ) ? false : $email;
		}

		public static function parseInt($num){
			return (int) preg_replace('/[^0-9]+/', '', $num);
		}

		public static function trace($obj,$exit=false){
			$d = current( debug_backtrace() );
			echo '<pre><legend>'.$d['file'].':'.$d['line'].'</legend>';
			if(is_string($obj) && strlen($obj)>0){
				echo $obj;
			}else{
				var_dump($obj);
			}
			echo '</pre>';
			if($exit) exit;
		}
		
		public static function getAllHeaders(){
			if(function_exists('getallheaders')){
				return getallheaders();
			}else{
				$headers = null;
   				foreach((array) $_SERVER as $name => $value){ 
					if(substr($name, 0, 5) == 'HTTP_'){ 
						$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
					}
				}
				return $headers;
    			}
		}

	}
