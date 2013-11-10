<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	class MoipPreferences extends MoipUsers {

		private $url;

		public function setRetry($retry){
			$this->setParameters($retry);
			$this->url = 'retry';
			return $this;
		}

		public function setNotification($notification){
			$this->setParameters(array('notification'=>$notification));
			return $this;
		}

		public function update(){
			$this->setBaseUrl('users/preferences');
			return $this->client->post($this->getBaseUrl().$this->url, $this->getParameters());
		}

	}