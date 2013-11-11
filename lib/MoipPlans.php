<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipPlans extends MoipBaseObject {
	
		public function __construct($obj){
			parent::__construct($obj);
			$this->setBaseUrl('plans');
		}

		public function setIdentification($identification){
			$this->setParameters($identification);
			return $this;
		}

		public function setValues($amount, $setup_fee=''){
			return $this->setAmount($amount)
						->setSetupFee($setup_fee);
		}

		public function setAmount($amount=''){
			$this->setParameters(array('amount'=>$amount));
			return $this;
		}

		public function setSetupFee($setup_fee=''){
			$this->setParameters(array('setup_fee'=>$setup_fee));
			return $this;
		}

		public function setInterval($unit='MONTH', $length=1){
			$this->setParameters(
				array(
					'interval' => array(
						'unit'   => $unit,
						'length' => $length
					)
				)
			);
			return $this;
		}

		public function setBillingCycles($cycles){
			$this->setParameters(array('billing_cycles'=>$cycles));
			return $this;
		}

		public function setTrial($days, $enabled=true){
			$this->setParameters(
				array(
					'trial' => array(
						'days'    => $days,
						'enabled' => $enabled ? true : false
					)
				)
			);
			return $this;
		}

		public function setConfigurations($status='ACTIVE', $max_qty=''){
			return $this->setStatus($status)
						->setMaxSignatures($max_qty);
		}

		public function setStatus($status='ACTIVE'){
			$this->setParameters(array('status'=>strtoupper($status)));
			return $this;
		}

		public function setMaxSignatures($max_qty=''){
			$this->setParameters(array('max_qty' => $max_qty));
			return $this;
		}

		public function create(){
			$this->client->post($this->getBaseUrl(), $this->getParameters());
			return $this->resetParameters()->client->response();
		}
	
		public function activate($code=''){
			return $this->toggleStatus(true, $code);
		}

		public function inactivate($code=''){
			return $this->toggleStatus(false, $code);
		}

		private function toggleStatus($activate=true, $code=''){
			if(!empty($code)) $this->setCode($code);
			$status = !$activate ? 'inactivate' : 'activate';
			return $this->client->put($this->getBaseUrl().$this->getCode().'/'.$status, null);
		}


	}
