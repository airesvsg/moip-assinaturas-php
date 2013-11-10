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
			return preg_replace('/[^0-9]+/', '', $num);
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

	}