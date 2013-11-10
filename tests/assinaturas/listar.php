<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');
	
	//Falta implementar a paginação

	//Listar todos as assinaturas
	//----------------------------------------
	$assinaturas = $moip->subscriptions->get();

	MoipHelper::trace($assinaturas);

	//Listar assinaturas com paginação
	//----------------------------------------
	$assinaturas = $moip->subscriptions
		->setPagination(4, 2)
		->get();

	MoipHelper::trace($assinaturas);
	
	//Formas para listar detalhe da assinatura
	//----------------------------------------
	$codigo_assinatura = 'codigo-assinatura';

	//Passando o código da assinatura no método get
	//----------------------------------------
	$assinatura = $moip->subscriptions->get($codigo_assinatura);

	MoipHelper::trace($assinatura);
	
	//Passando o código da assinatura pelo setCode
	//----------------------------------------
	$assinatura = $moip->subscriptions->setCode($codigo_assinatura)->get();

	MoipHelper::trace($assinatura);