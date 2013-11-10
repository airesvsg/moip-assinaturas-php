<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');

	$codigo_assinatura = 'codigo-assinatura';
	$codigo_plano      = 'codigo-plano';

	$assinatura = $moip->subscriptions
		->setCode($codigo_assinatura)
		->setPlan($codigo_plano)
		->setAmount(8800)
		->setNextInvoiceDate(
			array(
				"day"   => "05",
				"month" => "12",
				"year"  => "2013"
			)
		)
		->update();

	MoipHelper::trace($assinatura);