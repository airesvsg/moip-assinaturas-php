<?php

	require_once(dirname(__FILE__).'/../../lib/MoipAssinaturas.php');

	try{
		$moip = new MoipAssinaturas(
			array(
				'token'              => 'TOKEN',
				'key'                => 'KEY',
				'notification_token' => 'NOTIFICATION_TOKEN', //https://assinaturas.moip.com.br/configuracoes
				'sandbox'            => true
			)
		);
	}catch(MoipException $e){
		die($e->getMessage());
	}