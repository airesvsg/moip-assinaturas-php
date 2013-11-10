<?php
    
    /**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */
    
	class MoipResponse {
        
        private $response;
        private $error;

        private static $ERRORS_STATUS = array(
            400 => 'Houve um erro ou uma falha na requisição.',
            401 => 'Não autorizado. O token de autenticação não é válido ou ele não está habilitado para o Moip Assinaturas.',
            404 => 'Recurso não encontrado.'
        );

        public function __construct($response, $http_code){
            $this->response  = json_decode($response);
            $this->error = !($http_code>199 && $http_code<300);
            $is_valid_response = $this->response instanceof StdClass === true;
            if($this->error || !$is_valid_response){
                if(!$is_valid_response) $this->response = new StdClass;
                //ao editar as preferências não há retorno
                $this->response->message = $this->error ? "Erro" : "Sucesso";
                if($http_code && array_key_exists($http_code, self::$ERRORS_STATUS)){
                    $this->response->message = self::$ERRORS_STATUS[$http_code];
                }
            }
            $this->response->http_code = $http_code;
        }

        public function error(){
            return $this->error;
        }

        public function __get($name){
			if(isset($this->response->{$name})){
				return $this->response->{$name};
			}
            return null;
        }

	}