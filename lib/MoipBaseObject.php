<?php
	
	/**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
	
	abstract class MoipBaseObject {

		protected $code;

		protected $base;
		protected $client;

		protected $pagination;
		protected $parameters;

		private $baseUrl;

		public function __construct($obj){
			if($obj instanceof MoipAssinaturas){
				$this->base = $obj;
			}else{
				throw new MoipException("Instância inválida.");
			}
			$this->client     = new MoipClient($this->base->getCredential());
			$this->pagination = array();
			$this->parameters = array();
			$this->baseUrl    = '';
		}

		public function setCode($code){
			$this->code = $code;
			return $this;
		}

		protected function getCode(){
			return $this->code;
		}

		protected function setBaseUrl($path){
			$this->baseUrl = $this->base->getBaseUrl().preg_replace('/^[\/]+|[\/]+$/', '', $path).'/';
		}

		protected function getBaseUrl(){
			return $this->baseUrl;
		}

		public function setPagination($limit=10, $offset=0){
			$this->pagination = array(
				'limit'  => $limit,
				'offset' => $offset
			);
			return $this;
		}

		protected function getPagination(){
			return MoipHelper::isArray($this->pagination);
		}

		protected function setParameters($data){
			if(MoipHelper::isArray($data)){
				if(MoipHelper::isArray($this->parameters)){
					$this->parameters = array_merge($this->parameters, $data);
				}else{
					$this->parameters = $data;
				}
			}
			return $this;
		}

		protected function getParameters(){
			return MoipHelper::isArray($this->parameters);
		}

		protected function resetParameters(){
			$this->parameters = array();
			return $this;
		}

		public function update($code=''){
			if(!empty($code)) $this->setCode($code);
			$param = $this->getParameters();
			if($param && !isset($param['code'])){
				$param['code'] = $this->getCode();
			}elseif($param && isset($param['code']) && $param['code']){
				$this->setCode($param['code']);
			}
			$this->client->put($this->getBaseUrl().$this->getCode(), $param);
			return $this->resetParameters()->client->response();
		}
		
		public function get($code=''){
			if(!empty($code)) $this->setCode($code);
			$pagination = $this->getPagination();
			$pagination = $pagination ? '?'.http_build_query($pagination) : '';
			return $this->client->get($this->getBaseUrl().$this->getCode().$pagination);
		}

	}