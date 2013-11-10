<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_cliente = 'codigo-cliente';

	$cliente = $moip->customers
		->setBillingInfo(
			array(
				'holder_name'      => 'Nome Completo',
				'number'           => '4111111111111111',
				'expiration_month' => '04',
				'expiration_year'  => '15'
			)
		)
		->update($codigo_cliente);

	echo utf8_decode($cliente->message);
	MoipHelper::trace($cliente);