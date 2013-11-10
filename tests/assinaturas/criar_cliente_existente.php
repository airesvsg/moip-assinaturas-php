<?php

	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_assinatura = 'codigo-assinatura';
	$codigo_plano      = 'codigo-plano';
	$codigo_cliente    = 'codigo-cliente-existente';

	$cliente = $moip->customers->setCode($codigo_cliente);
	
	$assinatura = $moip->subscriptions
		->setPlan($codigo_plano)
		->setCode($codigo_assinatura)
		->setAmount(4400)
		->setCustomer($cliente)
		->create();
	
	MoipHelper::trace($assinatura);