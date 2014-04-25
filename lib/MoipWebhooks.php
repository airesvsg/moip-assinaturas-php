<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
     	
	class MoipWebhooks {

		private $data;
		private $obj;
		private $authorized;

		public function __construct($obj){
			$this->obj = $obj;
			$this->authorized = false;
		}
		
		public function authorized(){
			$headers = MoipHelper::getAllHeaders();
			$this->authorized = false;
			if(MoipHelper::isArray($headers) && array_key_exists('Authorization', $headers) && $this->obj->getNotificationToken() === $headers['Authorization']){
				$this->authorized = true;
			}
			return $this->authorized;
		}

		public function get($array=false){
			if(!$this->authorized())
				return false;
			$this->data = json_decode(file_get_contents('php://input'), $array);
			if(!empty($this->data)){
				$event = explode('.', ($array ? $this->data['event'] : $this->data->event));
				if($array){
					$this->data['_event'] = $this->data['event'];
					list($this->data['property'], $this->data['event']) = $event;
				}else{
					$this->data->_event = $this->data->event;
					list($this->data->property, $this->data->event) = $event;
				}
				return $this->data;
			}
			return false;
		}

		public function __get($attr){
			if($this->data)
				return is_array($this->data) ? $this->data[$attr] : $this->data->{$attr};
		}

	}
