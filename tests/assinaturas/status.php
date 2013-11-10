<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_assinatura = 'codigo-assinatura';

	//Suspender a assinatura
	$assinatura = $moip->subscriptions->suspend($codigo_assinatura);

	// Ou
	//$assinatura = $moip->subscriptions->setCode($codigo_assinatura)->suspend();

	MoipHelper::trace($assinatura);
	
	//Ativar a assinatura
	$assinatura = $moip->subscriptions->activate($codigo_assinatura);

	// Ou
	//$assinatura = $moip->subscriptions->setCode($codigo_assinatura)->activate();
	
	MoipHelper::trace($assinatura);
	
	//Cancelar a assinatura
	$assinatura = $moip->subscriptions->cancel($codigo_assinatura);

	// Ou
	//$assinatura = $moip->subscriptions->setCode($codigo_assinatura)->cancel();

	MoipHelper::trace($assinatura);
