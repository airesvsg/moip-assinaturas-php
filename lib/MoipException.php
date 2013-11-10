<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
     	
	class MoipException extends Exception {

		public function __construct( $message = null, $code = 0, Exception $previous = null ) {
	        parent::__construct( $message, $code, $previous );
	    }

	}