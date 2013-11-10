<?php
	
	require_once(dirname(__FILE__).'/../inc/moip.php');
	
	//Listar todos os planos
	//----------------------------------------
	$planos = $moip->plans->get();

	MoipHelper::trace($planos);

	//Listar planos com paginação
	//----------------------------------------
	$planos = $moip->plans
		->setPagination(4, 2)
		->get();

	MoipHelper::trace($planos,1);

	//Formas para listar detalhe do plano
	//----------------------------------------
	$codigo_plano = 'codigo-plano';

	//Passando o código do plano no método get
	$plano = $moip->plans->get($codigo_plano);

	MoipHelper::trace($plano);

	//Passando o código do plano pelo setCode
	$plano = $moip->plans->setCode($codigo_plano)->get();

	MoipHelper::trace($plano);
