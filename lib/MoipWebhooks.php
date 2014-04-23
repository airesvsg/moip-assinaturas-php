<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
     	
	class MoipWebhooks {

		private $data;

		public function __construct($obj){
			$headers    = getallheaders();
			$this->data = false;
			if(MoipHelper::isArray($headers) && array_key_exists('Authorization', $headers) && $obj->getNotificationToken() === $headers['Authorization']){
				$this->data = file_get_contents('php://input');
			}
		}

		public function get($array=false){
			$this->data = json_decode($this->data, $array) ;
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
			if($this->data){
				return is_array($this->data) ? $this->data[$attr] : $this->data->{$attr};
			}
		}

	}
