<?php
    
    /**
     * @author Aires Gonçalves <airesvsg@gmail.com>
     */

    class MoipClient {

        protected   $curl;
        private     $response;

        public function __construct($credential=''){
            $this->initialize($credential);
        }

        private function initialize($credential){
            $this->curl = curl_init();
            $header[] = "Authorization: Basic " . base64_encode($credential);
            $header[] = "Content-Type:  application/json";
            $header[] = "Accept:        application/json";
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
        }

        public function get($url, $data=array()){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');           
            curl_setopt($this->curl, CURLOPT_URL, MoipHelper::isArray($data) ? sprintf( "%s?%s", $url, json_encode($data)) : $url);
            return $this->fetch();
        }

        public function post($url, $data=array()){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($this->curl, CURLOPT_URL, $url);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
            return $this->fetch();
        }

        public function put($url, $data=array()){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($this->curl, CURLOPT_URL, $url);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
            return $this->fetch();
        }

        protected function fetch(){
            $response  = curl_exec($this->curl);
            $http_code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
            $this->response = new MoipResponse($response, $http_code);
            return $this->response;
        }

        public function response(){
            return $this->response;
        }
        
    }