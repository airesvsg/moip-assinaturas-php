<?php
		
	/**
	 * @author Aires Gonçalves <airesvsg@gmail.com>
	 */

	include_once(dirname(__FILE__).'/MoipAutoload.php');

	class MoipAssinaturas extends MoipAssinaturasBase {

		private static $INSTANCE;

		public static function getInstance() { 
			if(is_null(self::$INSTANCE)){
				self::$INSTANCE = new self(self::$CONFIG); 
			}
			return self::$INSTANCE;
		} 

	}