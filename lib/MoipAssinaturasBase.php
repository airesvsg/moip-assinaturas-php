<?php
    
    /**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */

	abstract class MoipAssinaturasBase {

        const TOKEN_LENGHT              = 32;
        const KEY_LENGTH                = 40;
        const NOTIFICATION_TOKEN_LENGHT = 32;

		private $baseUrl;
		private $credential;
        private $notification_token;

        protected static $CONFIG;

        private static $CLASSES = array('plans','customers','subscriptions','invoices','payments','preferences','webhooks');

		public function __construct($config=null){
            self::$CONFIG = array();
            if(MoipHelper::isArray($config)){
                $this->setCredential($config);
                $environment = isset($config['sandbox']) ? $config['sandbox'] : false;
                $this->setEnvironment($environment);
                $notification_token = isset($config['notification_token']) ? $config['notification_token'] : false;
                if($notification_token) $this->setNotificationToken($notification_token);
                self::$CONFIG = $config;
            }
        }

        public function __get($obj){
            if(!in_array($obj, self::$CLASSES)){
                throw new MoipException('Atributo inválido.');
            }else{
                $class = "Moip".ucfirst($obj);
                $this->{$obj} = new $class($this);
                return $this->{$obj};
            }
        }

		public function setEnvironment($sandbox=false){
			$this->baseUrl = 'https://'.($sandbox?'sandbox.':'').'moip.com.br/assinaturas/v1/';
			return $this;
		}

		public function getBaseUrl(){
			return $this->baseUrl;		
		}

        public function setNotificationToken($token){
            if(!$this->isValidNotificationToken($token)){
                throw new MoipException("Token de notificação inválido.");
            }
            $this->notification_token = $token;
            return $this;
        }

        public function getNotificationToken(){
            return $this->isValidNotificationToken($this->notification_token);
        }

        private function isValidNotificationToken($token){
            return strlen($token) === self::NOTIFICATION_TOKEN_LENGHT ? $token : false;
        }

    	public function setCredential($credential){
            if(!isset($credential['token']) || !$this->isValidToken($credential['token'])){
                throw new MoipException("Token inválido.");
            }elseif(!isset($credential['key']) || !$this->isValidKey($credential['key'])){
                throw new MoipException("Key inválida.");
            }
            $this->credential = $credential;
            return $this;
        }

        public function getCredential(){
            return MoipHelper::isArray($this->credential) && $this->isValidToken($this->credential['token']) && $this->isValidKey($this->credential['key']) ? ($this->credential['token'].':'.$this->credential['key']) : false;
        }

        private function isValidToken($token){
        	return strlen($token) === self::TOKEN_LENGHT;
        }

        private function isValidKey($key){
        	return strlen($key) === self::KEY_LENGTH;
        }

	}
