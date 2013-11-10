<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_assinatura = 'codigo-assinatura';

	$faturas = $moip->subscriptions->invoices($codigo_assinatura);

	//Ou 
	//$faturas = $moip->subscriptions->setCode($codigo_assinatura)->invoices();

	MoipHelper::trace($faturas);