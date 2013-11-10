<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipSubscriptions extends MoipBaseObject{

		private $new_customer;

		public function __construct($obj){
			parent::__construct($obj);
			$this->setBaseUrl('subscriptions');
			$this->new_customer = true;
		}

		public function setCode($code){
			$this->code = $code;
			parent::setParameters(array('code'=>$code));
			return $this;
		}

		public function setAmount($amount){
			parent::setParameters(array('amount'=>$amount));
			return $this;
		}

		public function setNextInvoiceDate($date){
			parent::setParameters(array('next_invoice_date'=>$date));
			return $this;
		}

		public function setPlan($code){
			parent::setParameters(
				array(
					'plan' => array(
						'code' => $code
					)
				)
			);
			return $this;
		}

		public function setCustomer($customer){
			if(method_exists($customer, 'getParameters')){
				$customer = $customer->getParameters();
			}
			parent::setParameters(array('customer'=>$customer));
			return $this;
		}

		public function create(){
			$params = $this->getParameters();
			$new_customer = true;
			if($params && array_key_exists('customer', $params) && count($params['customer']) === 1 && array_key_exists('code', $params['customer'])){
				$new_customer = false;
			}
			$this->client->post($this->getBaseUrl().("?new_customer={$new_customer}"), $params);
			return $this->resetParameters()->client->response();
		}

		public function invoices($code=''){
			if(!empty($code)) $this->setCode($code);
			return $this->client->get($this->getBaseUrl().$this->getCode().'/invoices');
		}

		public function suspend($code=''){
			return $this->toggleStatus('suspend', $code);
		}
		
		public function cancel($code=''){
			return $this->toggleStatus('cancel', $code);
		}

		public function activate($code=''){
			return $this->toggleStatus('activate', $code);
		}

		private function toggleStatus($status, $code=''){
			if(!empty($code)) $this->setCode($code);
			return $this->client->put($this->getBaseUrl().$this->getCode().'/'.$status);
		}

	}