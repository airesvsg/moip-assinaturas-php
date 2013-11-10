<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipPayments extends MoipBaseObject{

		public function __construct($obj){
			parent::__construct($obj);
			$this->setBaseUrl('payments');
		}
	
	}