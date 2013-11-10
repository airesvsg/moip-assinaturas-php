<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipCustomers extends MoipBaseObject{

		private $new_vault;

		public function __construct($obj){
			parent::__construct($obj);
			$this->setBaseUrl('customers');
			$this->new_vault = false;
		}

		public function setCode($code){
			$this->code = $code;
			parent::setParameters(array('code'=>$code));
			return $this;
		}

		public function setIdentification($identification){
			return $this->setParameters($identification);
			return $this;
		}

		public function setAddress($address){
			$this->setParameters(array('address'=>$address));
			return $this;
		}

		public function setBillingInfo($billing_info){
			$this->setParameters(
				array(
					'billing_info' => array(
						'credit_card' => $billing_info
					)
				)
			);
			return $this;
		}

		public function setNewVault($new_vault){
			$this->new_vault = $new_vault ? true : false;
			return $this;
		}

		public function create($new_vault=false){
			MoipHelper::trace($this->getParameters(),1);
			$this->setNewVault($new_vault)
				->client->post($this->getBaseUrl().("?new_vault={$this->new_vault}"), $this->getParameters());
			return $this->resetParameters()->client->response();
		}

		public function update($code=''){
			$param = $this->getParameters();
			if($param && count($param)===1 && array_key_exists('billing_info', $param) && array_key_exists('credit_card', $param['billing_info'])){
				if(!empty($code)) $this->setCode($code);
				return $this->client->put($this->getBaseUrl().$this->getCode().'/billing_infos', $param['billing_info']);
			}
			return parent::update($code);
		}

	}