<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipInvoices extends MoipBaseObject{

		public function __construct($obj){
			parent::__construct($obj);
			$this->setBaseUrl('invoices');
		}

		public function payments($code=''){
			if(!empty($code)) $this->setCode($code);
			return $this->client->get($this->getBaseUrl().$this->getCode().'/payments');
		}

		public function retry($code=''){
			if(!empty($code)) $this->setCode($code);
			return $this->client->post($this->getBaseUrl().$this->getCode().'/retry');
		}
	
	}